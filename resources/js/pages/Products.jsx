import React, { useState, useEffect } from 'react';
import { useSearchParams, Navigate } from 'react-router-dom';
import { motion } from 'framer-motion';
import {
    Package,
    CheckCircle2,
    XCircle,
    ChevronRight,
    Loader2,
    Box,
    FileText
} from 'lucide-react';
import { useLanguage } from '../contexts/LanguageContext';
import { useAuth } from '../contexts/AuthContext';
import { useCart } from '../contexts/CartContext';
import { productService } from '../services/api';
import PortalLayout from '../components/PortalLayout';
import './Products.css';

const Products = () => {
    const { language, t } = useLanguage();
    const { isAuthenticated, loading: authLoading } = useAuth();
    const { addToCart } = useCart();
    const [searchParams, setSearchParams] = useSearchParams();
    const [searchQuery, setSearchQuery] = useState('');
    const [selectedCategory, setSelectedCategory] = useState(searchParams.get('category') || 'all');
    const [products, setProducts] = useState([]);
    const [categories, setCategories] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        fetchCategories();
        fetchProducts();
    }, [selectedCategory, searchQuery, language]);

    const fetchCategories = async () => {
        try {
            const data = await productService.getCategories();
            const mappedCategories = data.map(cat => ({
                id: cat.slug,
                name: cat[`name_${language}`] || cat.name_en
            }));

            setCategories([
                { id: 'all', name: t('products.allCategories') },
                ...mappedCategories
            ]);
        } catch (error) {
            setCategories([
                { id: 'all', name: t('products.allCategories') },
            ]);
        }
    };

    const fetchProducts = async () => {
        setLoading(true);
        try {
            const data = await productService.getAll(selectedCategory, searchQuery);
            setProducts(data);
        } catch (error) {
            console.error('Error fetching products:', error);
        } finally {
            setLoading(false);
        }
    };

    const handleCategoryChange = (categoryId) => {
        setSelectedCategory(categoryId);
        if (categoryId === 'all') {
            setSearchParams({});
        } else {
            setSearchParams({ category: categoryId });
        }
    };

    const handleAddToCart = (product) => {
        const cartProduct = {
            ...product,
            name: {
                en: product.nameEn,
                fr: product.nameFr,
                ar: product.nameAr
            }
        };
        addToCart(cartProduct);
    };

    const getLocalizedText = (item, field) => {
        const langKey = language.charAt(0).toUpperCase() + language.slice(1);
        return item[`${field}${langKey}`] || item[`${field}En`];
    };

    if (authLoading) return <div className="portal-loader-overlay"><div className="portal-loader"></div></div>;
    if (!isAuthenticated) return <Navigate to="/login" />;

    return (
        <PortalLayout
            activePage="products"
            title={t('products.title')}
            subtitle={t('products.subtitle')}
        >
            <div className="products-page-content">
                <div className="portal-grid inventory-layout">
                    {/* Categories Sidebar (within main content) */}
                    <div className="inventory-sidebar">
                        <div className="portal-card mini">
                            <h3>{t('products.categories')}</h3>
                            <div className="portal-category-list">
                                {categories.map(category => (
                                    <button
                                        key={category.id}
                                        className={`portal-cat-btn ${selectedCategory === category.id ? 'active' : ''}`}
                                        onClick={() => handleCategoryChange(category.id)}
                                    >
                                        <ChevronRight size={14} />
                                        {category.name}
                                    </button>
                                ))}
                            </div>
                        </div>
                    </div>

                    {/* Main Products Grid */}
                    <div className="inventory-main">
                        {loading ? (
                            <div className="portal-table-loading">
                                <Loader2 className="spinner" size={40} />
                            </div>
                        ) : products.length === 0 ? (
                            <div className="portal-card table-empty">
                                <Box size={48} />
                                <p>{t('products.noResults')}</p>
                            </div>
                        ) : (
                            <div className="pro-inventory-grid">
                                {products.map(product => (
                                    <motion.div
                                        key={product.id}
                                        className="pro-product-card"
                                        initial={{ opacity: 0, y: 10 }}
                                        animate={{ opacity: 1, y: 0 }}
                                    >
                                        <div className="pro-img-wrapper">
                                            {product.imageUrl ? (
                                                <img src={product.imageUrl} alt={getLocalizedText(product, 'name')} />
                                            ) : (
                                                <div className="pro-img-placeholder"><Package size={30} /></div>
                                            )}
                                            <div className="pro-stock-badge">
                                                {product.inStock ?
                                                    <span className="in-stock"><CheckCircle2 size={10} /> AVAILABLE</span> :
                                                    <span className="out-stock"><XCircle size={10} /> LEAD TIME REQ.</span>
                                                }
                                            </div>
                                        </div>
                                        <div className="pro-info">
                                            <span className="pro-ref">REF: {product.id.toString().padStart(6, '0')}</span>
                                            <h3 className="pro-name">{getLocalizedText(product, 'name')}</h3>
                                            <p className="pro-desc">{getLocalizedText(product, 'description')?.substring(0, 60)}...</p>
                                            <div className="pro-footer">
                                                <div className="pro-actions-primary">
                                                    <div className="pro-price">
                                                        <span className="val">{Number(product.price).toFixed(2)}</span>
                                                        <span className="cur">€</span>
                                                    </div>
                                                    <button
                                                        className="pro-action-btn primary"
                                                        onClick={() => handleAddToCart(product)}
                                                        disabled={!product.inStock}
                                                    >
                                                        ADD TO PO
                                                    </button>
                                                </div>
                                                <div className="pro-actions-secondary">
                                                    {product.technicalSheetUrl && (
                                                        <a
                                                            href={product.technicalSheetUrl}
                                                            target="_blank"
                                                            rel="noopener noreferrer"
                                                            className="pro-action-btn secondary"
                                                        >
                                                            <FileText size={14} />
                                                            TECH SHEET
                                                        </a>
                                                    )}
                                                </div>
                                            </div>
                                        </div>
                                    </motion.div>
                                ))}
                            </div>
                        )}
                    </div>
                </div>
            </div>
        </PortalLayout>
    );
};

export default Products;
