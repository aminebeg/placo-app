import React, { useState } from 'react';
import { useNavigate, Link, Navigate } from 'react-router-dom';
import { motion, AnimatePresence } from 'framer-motion';
import {
    Package,
    Trash2,
    Plus,
    Minus,
    CreditCard,
    ShieldCheck
} from 'lucide-react';
import { useLanguage } from '../contexts/LanguageContext';
import { useCart } from '../contexts/CartContext';
import { useAuth } from '../contexts/AuthContext';
import { orderService } from '../services/api';
import PortalLayout from '../components/PortalLayout';
import './Cart.css';

const Cart = () => {
    const { language, t } = useLanguage();
    const { cart, removeFromCart, updateQuantity, getCartTotal, clearCart } = useCart();
    const { user, isAuthenticated } = useAuth();
    const navigate = useNavigate();
    const [loading, setLoading] = useState(false);

    const subtotal = getCartTotal();
    const total = subtotal;

    const handleCheckout = async () => {
        if (!isAuthenticated) {
            navigate('/login');
            return;
        }

        if (cart.length === 0) return;

        setLoading(true);
        try {
            const orderItems = cart.map(item => ({
                productId: item.id,
                quantity: item.quantity,
                price: item.price
            }));

            await orderService.create({
                items: orderItems,
                subtotal: total,
                tax: 0,
                shipping: 0,
                total
            });

            clearCart();
            navigate('/dashboard');
        } catch (error) {
            console.error('Checkout error:', error);
        } finally {
            setLoading(false);
        }
    };

    const getLocalizedText = (item, field) => {
        if (item[field] && typeof item[field] === 'object') {
            return item[field][language] || item[field]['en'];
        }
        return item[field];
    };

    if (!isAuthenticated) return <Navigate to="/login" />;

    return (
        <PortalLayout
            activePage="cart"
            title="Procurement Management"
            subtitle={<>Drafting Purchase Order for <strong>{user?.company || 'Authenticated Professional'}</strong></>}
        >
            <div className="cart-page-content">
                <div className="portal-grid cart-layout">
                    <div className="portal-card transactions">
                        <div className="card-header">
                            <div className="header-left">
                                <h2>Requested Inventory</h2>
                                <span className="item-count-tag">{cart.length} Items Selected</span>
                            </div>
                        </div>

                        <div className="data-table-wrapper">
                            {cart.length === 0 ? (
                                <div className="table-empty">
                                    <Package size={40} className="text-gold" />
                                    <p>No items currently in procurement list.</p>
                                    <Link to="/products" className="txt-btn">Browse Catalog</Link>
                                </div>
                            ) : (
                                <table className="portal-table">
                                    <thead>
                                        <tr>
                                            <th>PRODUCT SPECIFICATION</th>
                                            <th>UNIT PRICE</th>
                                            <th>VOLUME / QTY</th>
                                            <th className="text-right">SUBTOTAL</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <AnimatePresence>
                                            {cart.map(item => (
                                                <motion.tr
                                                    key={item.id}
                                                    initial={{ opacity: 0 }}
                                                    animate={{ opacity: 1 }}
                                                    exit={{ opacity: 0, x: -20 }}
                                                >
                                                    <td>
                                                        <div className="product-spec-cell">
                                                            <div className="spec-icon"><Package size={16} /></div>
                                                            <span className="spec-name">{getLocalizedText(item, 'name')}</span>
                                                        </div>
                                                    </td>
                                                    <td className="font-mono">{Number(item.price).toFixed(2)} €</td>
                                                    <td>
                                                        <div className="portal-qty-picker">
                                                            <button onClick={() => updateQuantity(item.id, item.quantity - 1)} disabled={item.quantity <= 1}><Minus size={12} /></button>
                                                            <span className="q-num">{item.quantity}</span>
                                                            <button onClick={() => updateQuantity(item.id, item.quantity + 1)}><Plus size={12} /></button>
                                                        </div>
                                                    </td>
                                                    <td className="text-right font-bold">{(item.price * item.quantity).toFixed(2)} €</td>
                                                    <td className="text-right">
                                                        <button className="trash-action" onClick={() => removeFromCart(item.id)}>
                                                            <Trash2 size={16} />
                                                        </button>
                                                    </td>
                                                </motion.tr>
                                            ))}
                                        </AnimatePresence>
                                    </tbody>
                                </table>
                            )}
                        </div>
                    </div>

                    {/* Order Summary Panel */}
                    <div className="portal-side-panels">
                        <div className="portal-card summary-panel">
                            <h3>PO Financial Summary</h3>
                            <div className="financial-lines">
                                <div className="f-line total">
                                    <span>Gross Portfolio Value</span>
                                    <span className="text-gold">{total.toFixed(2)} €</span>
                                </div>
                            </div>

                            <button
                                className="portal-primary-btn"
                                onClick={handleCheckout}
                                disabled={loading || cart.length === 0}
                            >
                                {loading ? 'Processing...' : 'Finalize Purchase Order'}
                                <CreditCard size={18} />
                            </button>

                            <div className="portal-trust-notif">
                                <ShieldCheck size={14} />
                                <span>Industrial grade security & tracking.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </PortalLayout>
    );
};

export default Cart;
