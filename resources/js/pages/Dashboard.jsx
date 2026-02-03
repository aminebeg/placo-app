import React, { useState, useEffect } from 'react';
import { Navigate, Link } from 'react-router-dom';
import { motion } from 'framer-motion';
import {
    PlusCircle,
    ArrowUpRight,
    Activity,
    Briefcase,
    Zap,
    TrendingUp,
    ClipboardList,
    FileLock2,
    FileText,
    Headphones
} from 'lucide-react';
import { useAuth } from '../contexts/AuthContext';
import { useLanguage } from '../contexts/LanguageContext';
import { useCart } from '../contexts/CartContext';
import { orderService, productService } from '../services/api';
import PortalLayout from '../components/PortalLayout';
import './Dashboard.css';

const Dashboard = () => {
    const { user, isAuthenticated, loading: authLoading } = useAuth();
    const { t } = useLanguage();
    const { addToCart } = useCart();

    const [orders, setOrders] = useState([]);
    const [loading, setLoading] = useState(true);
    const [quickAddRef, setQuickAddRef] = useState('');
    const [quickAddLoading, setQuickAddLoading] = useState(false);
    const [quickAddError, setQuickAddError] = useState('');

    useEffect(() => {
        if (isAuthenticated) {
            fetchOrders();
        }
    }, [isAuthenticated]);

    const fetchOrders = async () => {
        try {
            const data = await orderService.getMyOrders();
            setOrders(Array.isArray(data) ? data : (data?.orders || []));
        } catch (error) {
            console.error('Error fetching orders:', error);
        } finally {
            setLoading(false);
        }
    };

    const handleQuickAdd = async (e) => {
        e.preventDefault();
        if (!quickAddRef) return;

        setQuickAddLoading(true);
        setQuickAddError('');
        try {
            const products = await productService.getAll();
            const product = products.find(p => p.id.toString() === quickAddRef || p.nameEn.toLowerCase().includes(quickAddRef.toLowerCase()));

            if (product) {
                const cartProduct = {
                    ...product,
                    name: { en: product.nameEn, fr: product.nameFr, ar: product.nameAr },
                    quantity: 1
                };
                addToCart(cartProduct);
                setQuickAddRef('');
            } else {
                setQuickAddError('Reference not found in inventory.');
            }
        } catch (err) {
            setQuickAddError('Logistics check failed.');
        } finally {
            setQuickAddLoading(false);
        }
    };

    if (authLoading) return <div className="portal-loader-overlay"><div className="portal-loader"></div></div>;
    if (!isAuthenticated) return <Navigate to="/login" />;

    return (
        <PortalLayout
            activePage="dashboard"
            title="Operational Overview"
            subtitle={<>Strategic procurement management for <strong>{user?.company || 'Professional Account'}</strong></>}
        >
            <div className="dashboard-page-content">
                <div className="dashboard-action-bar">
                    <div className="quick-add-form-wrapper">
                        <form onSubmit={handleQuickAdd} className="quick-add-form">
                            <Zap size={16} className="text-gold" />
                            <input
                                type="text"
                                placeholder="Quick Add by Ref / SKU..."
                                value={quickAddRef}
                                onChange={(e) => setQuickAddRef(e.target.value)}
                            />
                            <button type="submit" disabled={quickAddLoading}>
                                {quickAddLoading ? '...' : <PlusCircle size={20} />}
                            </button>
                        </form>
                        {quickAddError && <span className="qa-error">{quickAddError}</span>}
                    </div>
                </div>

                {/* Industrial KPIs */}
                <div className="kpi-grid">
                    <div className="kpi-card glass">
                        <div className="kpi-icon gold"><TrendingUp size={24} /></div>
                        <div className="kpi-data">
                            <span className="kpi-label">Active Transmissions</span>
                            <span className="kpi-value">{orders.filter(o => o.status !== 'delivered').length}</span>
                            <span className="kpi-trend positive">+12% vs last month</span>
                        </div>
                    </div>
                    <div className="kpi-card glass">
                        <div className="kpi-icon blue"><Briefcase size={24} /></div>
                        <div className="kpi-data">
                            <span className="kpi-label">Account Status</span>
                            <span className="kpi-value">Active</span>
                            <span className="kpi-trend positive">Premium Verified</span>
                        </div>
                    </div>
                    <div className="kpi-card glass">
                        <div className="kpi-icon green"><Activity size={24} /></div>
                        <div className="kpi-data">
                            <span className="kpi-label">Procurement Value</span>
                            <span className="kpi-value">{orders.reduce((acc, o) => acc + Number(o.total || 0), 0).toFixed(2)} €</span>
                            <span className="kpi-trend positive">Portfolio Total</span>
                        </div>
                    </div>
                </div>

                <div className="portal-grid main-layout">
                    {/* Central Intelligence: Recent Activity */}
                    <div className="portal-card activity-card">
                        <div className="card-header">
                            <h2>Transaction Log</h2>
                            <Link to="/orders" className="txt-btn">View Full History <ArrowUpRight size={14} /></Link>
                        </div>

                        <div className="data-table-wrapper compact">
                            {loading ? (
                                <div className="table-skeleton"></div>
                            ) : orders.length === 0 ? (
                                <div className="table-empty">
                                    <ClipboardList size={40} />
                                    <p>No active logistics records.</p>
                                </div>
                            ) : (
                                <table className="portal-table">
                                    <thead>
                                        <tr>
                                            <th>REFERENCE</th>
                                            <th>TIMESTAMP</th>
                                            <th>STATUS</th>
                                            <th className="text-right">VALUATION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {orders.slice(0, 5).map(order => (
                                            <tr key={order.id}>
                                                <td className="font-mono">#PO-{order.orderNumber}</td>
                                                <td className="dim-text">{new Date(order.createdAt).toLocaleDateString()}</td>
                                                <td>
                                                    <span className={`p-pill ${order.status}`}>
                                                        {order.status}
                                                    </span>
                                                </td>
                                                <td className="text-right font-bold">
                                                    {Number(order.total).toFixed(2)} €
                                                </td>
                                            </tr>
                                        ))}
                                    </tbody>
                                </table>
                            )}
                        </div>
                    </div>

                    {/* Professional Side Panels */}
                    <div className="portal-side-panels">
                        {/* Technical Resources Panel */}
                        <div className="portal-card menu-card">
                            <h3>Technical Assets</h3>
                            <div className="asset-list">
                                <button className="asset-item">
                                    <FileLock2 size={18} className="text-gold" />
                                    <div className="asset-info">
                                        <span className="name">Conformity Certificates</span>
                                        <span className="type">PDF • 2.4 MB</span>
                                    </div>
                                </button>
                                <button className="asset-item">
                                    <FileText size={18} className="text-gold" />
                                    <div className="asset-info">
                                        <span className="name">Installation Guides</span>
                                        <span className="type">Draft • Online</span>
                                    </div>
                                </button>
                            </div>
                        </div>

                        {/* Direct Representative Panel */}
                        <div className="portal-card support-card">
                            <h3>Technical Support</h3>
                            <div className="rep-contact">
                                <div className="rep-avatar">JS</div>
                                <div className="rep-info">
                                    <span className="rep-name">Jean-Sebastien</span>
                                    <span className="rep-title">Technical Account Manager</span>
                                </div>
                            </div>
                            <button className="portal-outline-btn w-full">
                                <Headphones size={18} />
                                Request Consultation
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </PortalLayout>
    );
};

export default Dashboard;
