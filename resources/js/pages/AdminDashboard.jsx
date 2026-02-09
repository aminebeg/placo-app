import React, { useState, useEffect } from 'react';
import { Navigate } from 'react-router-dom';
import { motion, AnimatePresence } from 'framer-motion';
import {
    Package,
    Plus,
    Edit2,
    Trash2,
    X,
    FileText,
    Download,
    Eye,
    TrendingUp,
    Save,
    Users,
    Activity,
    CreditCard,
    Briefcase,
    AlertTriangle,
    BarChart3,
    ShieldAlert,
    UserCog,
    CheckCircle2,
    Clock,
    Truck
} from 'lucide-react';
import { useAuth } from '../contexts/AuthContext';
import { productService, orderService, userService } from '../services/api';
import PortalLayout from '../components/PortalLayout';
import './AdminDashboard.css';

const AdminDashboard = () => {
    const { isAuthenticated, isAdmin, isAgent, loading: authLoading } = useAuth();
    const [activeTab, setActiveTab] = useState('overview');
    const [products, setProducts] = useState([]);
    const [orders, setOrders] = useState([]);
    const [usersList, setUsersList] = useState([]);
    const [categories, setCategories] = useState([]);
    const [loading, setLoading] = useState(true);
    const [isEditing, setIsEditing] = useState(false);
    const [currentProduct, setCurrentProduct] = useState(null);
    const [stats, setStats] = useState({
        totalRevenue: 0,
        activeOrders: 0,
        totalUsers: 0,
        lowStockItems: 0
    });

    useEffect(() => {
        if ((isAdmin || isAgent) && !authLoading) {
            fetchAllData();
        }
    }, [isAdmin, isAgent, authLoading]);

    const fetchAllData = async () => {
        setLoading(true);
        console.log('Fetching data... isAdmin:', isAdmin, 'isAgent:', isAgent);
        try {
            const [prodData, orderData, catData] = await Promise.all([
                productService.getAll(),
                orderService.getAllOrders(),
                productService.getCategories()
            ]);

            console.log('Orders received:', orderData.length);
            setProducts(prodData);
            setOrders(orderData);
            setCategories(catData);

            // Calculate Stats
            const revenue = orderData.reduce((acc, o) => acc + Number(o.total || 0), 0);
            const active = orderData.filter(o => ['pending', 'processing'].includes(o.status)).length;
            const lowStock = prodData.filter(p => !p.inStock).length;

            // Only fetch users for admins
            let userData = [];
            if (isAdmin) {
                userData = await userService.getAll();
                setUsersList(userData);
            }

            setStats({
                totalRevenue: revenue,
                activeOrders: active,
                totalUsers: userData.length || 0,
                lowStockItems: lowStock
            });

        } catch (error) {
            console.error('Error fetching admin intelligence:', error);
        } finally {
            setLoading(false);
        }
    };

    const handleUpdateOrderStatus = async (id, status) => {
        try {
            await orderService.updateStatus(id, status);
            fetchAllData(); // Refresh all
        } catch (error) {
            alert('Logistics status update failed.');
        }
    };

    const handleUpdateUserRole = async (id, role) => {
        try {
            await userService.updateRole(id, role);
            fetchAllData();
        } catch (error) {
            alert('Privilege update failed.');
        }
    };

    const handleDeleteUser = async (id) => {
        if (window.confirm('Are you sure you want to decommission this user account?')) {
            try {
                await userService.delete(id);
                fetchAllData();
            } catch (error) {
                alert(error.response?.data?.message || 'Decommissioning failed.');
            }
        }
    };

    const handleEditProduct = (product) => {
        const mappedProduct = {
            ...product,
            categoryId: product.categoryId || (categories.find(c => c.slug === product.categorySlug)?.id || 1)
        };
        setCurrentProduct(mappedProduct);
        setIsEditing(true);
    };

    const handleCreateProduct = () => {
        setCurrentProduct({
            nameEn: '', nameFr: '', nameAr: '',
            descriptionEn: '', descriptionFr: '', descriptionAr: '',
            technicalSheetUrl: '',
            categoryId: categories[0]?.id || 1, price: 0, inStock: true
        });
        setIsEditing(true);
    };

    const handleSaveProduct = async (e) => {
        e.preventDefault();
        try {
            if (currentProduct.id) {
                await productService.update(currentProduct.id, currentProduct);
            } else {
                await productService.create(currentProduct);
            }
            setIsEditing(false);
            fetchAllData();
        } catch (error) {
            alert('Failed to save product specification.');
        }
    };

    if (authLoading) return <div className="portal-loader-overlay"><div className="portal-loader"></div></div>;
    if (!isAuthenticated || !isAdmin) return <Navigate to="/login" />;

    const renderOverview = () => (
        <div className="admin-overview">
            <div className="kpi-grid">
                <div className="kpi-card glass">
                    <div className="kpi-icon green"><TrendingUp size={24} /></div>
                    <div className="kpi-data">
                        <span className="kpi-label">Gross Revenue</span>
                        <span className="kpi-value">{stats.totalRevenue.toFixed(2)} €</span>
                        <span className="kpi-trend positive">Portfolio Valuation</span>
                    </div>
                </div>
                <div className="kpi-card glass">
                    <div className="kpi-icon gold"><Clock size={24} /></div>
                    <div className="kpi-data">
                        <span className="kpi-label">Active Transmissions</span>
                        <span className="kpi-value">{stats.activeOrders}</span>
                        <span className="kpi-trend">Pending Logistics</span>
                    </div>
                </div>
                <div className="kpi-card glass">
                    <div className="kpi-icon blue"><Users size={24} /></div>
                    <div className="kpi-data">
                        <span className="kpi-label">Registered Stakeholders</span>
                        <span className="kpi-value">{stats.totalUsers}</span>
                        <span className="kpi-trend positive">Database Growth</span>
                    </div>
                </div>
                <div className="kpi-card glass">
                    <div className="kpi-icon red"><AlertTriangle size={24} /></div>
                    <div className="kpi-data">
                        <span className="kpi-label">Critical Inventory</span>
                        <span className="kpi-value">{stats.lowStockItems}</span>
                        <span className="kpi-trend negative">Replenishment Required</span>
                    </div>
                </div>
            </div>

            <div className="portal-grid main-layout">
                <div className="portal-card">
                    <div className="card-header">
                        <h2>Recent Logistics Activity</h2>
                        <button className="txt-btn" onClick={() => setActiveTab('orders')}>Audit All <ArrowUpRight size={14} /></button>
                    </div>
                    <div className="data-table-wrapper compact">
                        <table className="portal-table">
                            <thead>
                                <tr>
                                    <th>REFERENCE</th>
                                    <th>STAKEHOLDER</th>
                                    <th>STATUS</th>
                                    <th className="text-right">VALUATION</th>
                                </tr>
                            </thead>
                            <tbody>
                                {orders.slice(0, 5).map(o => (
                                    <tr key={o.id}>
                                        <td className="font-mono text-gold">#PO-{o.orderNumber}</td>
                                        <td>{o.user?.firstName} {o.user?.lastName}</td>
                                        <td><span className={`p-pill ${o.status}`}>{o.status}</span></td>
                                        <td className="text-right font-bold">{Number(o.total).toFixed(2)} €</td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </div>

                <div className="portal-side-panels">
                    <div className="portal-card alert-card">
                        <h3>System Integrity</h3>
                        <div className="integrity-status">
                            <div className="status-item">
                                <ShieldAlert size={18} className="text-gold" />
                                <span>Security Protocol: Active</span>
                            </div>
                            <div className="status-item">
                                <Activity size={18} className="text-gold" />
                                <span>Load Balancer: Optimal</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );

    const renderOrders = () => (
        <div className="portal-card full-width">
            <div className="card-header">
                <div className="header-left">
                    <h2>Master Transaction Ledger</h2>
                    <span className="item-count-tag">{orders.length} Global Records</span>
                </div>
                {isAgent && (
                    <button className="btn btn-primary" onClick={() => alert('Order creation form coming soon!')}>
                        <Plus size={18} /> Create Order
                    </button>
                )}
            </div>
            <div className="data-table-wrapper">
                <table className="portal-table">
                    <thead>
                        <tr>
                            <th>PO REFERENCE</th>
                            <th>STAKEHOLDER / COMPANY</th>
                            <th>TIMESTAMP</th>
                            <th className="text-center">LOGISTICS PROGRESSION</th>
                            <th className="text-right">VALUATION</th>
                            <th className="text-right">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        {orders.map(order => (
                            <tr key={order.id}>
                                <td><span className="font-mono text-gold">#PO-{order.orderNumber}</span></td>
                                <td>
                                    <div className="material-info">
                                        <span className="m-name">{order.user?.firstName} {order.user?.lastName}</span>
                                        <span className="m-ref">{order.user?.company || 'Contractor'}</span>
                                    </div>
                                </td>
                                <td className="text-muted">{new Date(order.createdAt).toLocaleDateString()}</td>
                                <td>
                                    <div className="status-control-cell">
                                        <select
                                            className={`p-pill ${order.status} select-input`}
                                            value={order.status}
                                            onChange={(e) => handleUpdateOrderStatus(order.id, e.target.value)}
                                        >
                                            <option value="pending">Pending Audit</option>
                                            <option value="processing">In Production</option>
                                            <option value="delivered">Dispatched/Completed</option>
                                            <option value="cancelled">Terminated</option>
                                        </select>
                                    </div>
                                </td>
                                <td className="font-bold text-right">{Number(order.total).toFixed(2)} €</td>
                                <td className="text-right">
                                    <button className="icon-action-btn" title="Inspect Documentation"><Eye size={18} /></button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </div>
    );

    const renderProducts = () => (
        <div className="portal-card full-width">
            {isEditing ? (
                <div className="admin-edit-container">
                    <div className="card-header">
                        <h2>{currentProduct.id ? 'Refine Product Specs' : 'Initialize New Asset'}</h2>
                        <button className="btn-close" onClick={() => setIsEditing(false)}><X size={20} /></button>
                    </div>
                    <form onSubmit={handleSaveProduct} className="premium-form">
                        <div className="form-grid-three">
                            <div className="form-group">
                                <label className="form-label">Name (EN)</label>
                                <input className="form-input" value={currentProduct.nameEn} onChange={e => setCurrentProduct({ ...currentProduct, nameEn: e.target.value })} required />
                            </div>
                            <div className="form-group">
                                <label className="form-label">Name (FR)</label>
                                <input className="form-input" value={currentProduct.nameFr} onChange={e => setCurrentProduct({ ...currentProduct, nameFr: e.target.value })} required />
                            </div>
                            <div className="form-group">
                                <label className="form-label">Name (AR)</label>
                                <input className="form-input" dir="rtl" value={currentProduct.nameAr} onChange={e => setCurrentProduct({ ...currentProduct, nameAr: e.target.value })} required />
                            </div>
                        </div>
                        <div className="form-grid-three">
                            <div className="form-group">
                                <label className="form-label">Category</label>
                                <select className="form-input" value={currentProduct.categoryId} onChange={e => setCurrentProduct({ ...currentProduct, categoryId: parseInt(e.target.value) })}>
                                    {categories.map(c => <option key={c.id} value={c.id}>{c.nameEn}</option>)}
                                </select>
                            </div>
                            <div className="form-group">
                                <label className="form-label">Price (EUR)</label>
                                <input type="number" step="0.01" className="form-input" value={currentProduct.price} onChange={e => setCurrentProduct({ ...currentProduct, price: parseFloat(e.target.value) })} required />
                            </div>
                            <div className="form-group">
                                <label className="form-label">Inventory Status</label>
                                <select className="form-input" value={currentProduct.inStock} onChange={e => setCurrentProduct({ ...currentProduct, inStock: e.target.value === 'true' })}>
                                    <option value="true">In Stock</option>
                                    <option value="false">Lead Time Req.</option>
                                </select>
                            </div>
                        </div>
                        <div className="form-actions-admin">
                            <button type="button" className="btn btn-ghost" onClick={() => setIsEditing(false)}>Discard</button>
                            <button type="submit" className="btn btn-primary"><Save size={18} /> Commit Changes</button>
                        </div>
                    </form>
                </div>
            ) : (
                <>
                    <div className="card-header">
                        <div className="header-left">
                            <h2>Asset Inventory Audit</h2>
                            <span className="item-count-tag">{products.length} Items Listed</span>
                        </div>
                        <button className="portal-primary-btn sm" onClick={handleCreateProduct}><Plus size={16} /> Add Asset</button>
                    </div>
                    <div className="data-table-wrapper">
                        <table className="portal-table">
                            <thead>
                                <tr>
                                    <th>ASSET</th>
                                    <th>CATEGORY</th>
                                    <th>PRICE</th>
                                    <th>STATUS</th>
                                    <th className="text-right">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                {products.map(p => (
                                    <tr key={p.id}>
                                        <td>
                                            <div className="product-spec-cell">
                                                <div className="spec-icon"><Package size={16} /></div>
                                                <div className="material-info">
                                                    <span className="m-name">{p.nameEn}</span>
                                                    <span className="m-ref">SKU: {p.id}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{categories.find(c => c.id === p.categoryId)?.nameEn || 'N/A'}</td>
                                        <td className="font-mono text-gold">{Number(p.price).toFixed(2)} €</td>
                                        <td><span className={`p-pill ${p.inStock ? 'delivered' : 'pending'}`}>{p.inStock ? 'ACTIVE' : 'DEPLETED'}</span></td>
                                        <td className="text-right">
                                            <div className="action-cell">
                                                <button className="icon-action-btn" onClick={() => handleEditProduct(p)}><Edit2 size={16} /></button>
                                                <button className="icon-action-btn delete" onClick={() => handleDeleteProduct(p.id)}><Trash2 size={16} /></button>
                                            </div>
                                        </td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </>
            )}
        </div>
    );

    const renderUsers = () => (
        <div className="portal-card full-width">
            <div className="card-header">
                <div className="header-left">
                    <h2>Stakeholder Directory</h2>
                    <span className="item-count-tag">{usersList.length} Authenticated Accounts</span>
                </div>
            </div>
            <div className="data-table-wrapper">
                <table className="portal-table">
                    <thead>
                        <tr>
                            <th>IDENTITY</th>
                            <th>ORGANIZATION</th>
                            <th>EMAIL</th>
                            <th>PRIVILEGE LEVEL</th>
                            <th className="text-right">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        {usersList.map(u => (
                            <tr key={u.id}>
                                <td>
                                    <div className="user-identity-cell">
                                        <div className={`u-avatar sm ${u.role === 'admin' ? 'admin' : ''}`}>
                                            {u.firstName?.[0]}
                                        </div>
                                        <span className="font-bold">{u.firstName} {u.lastName}</span>
                                    </div>
                                </td>
                                <td className="text-muted">{u.company || 'Private Contractor'}</td>
                                <td className="text-muted">{u.email}</td>
                                <td>
                                    <select
                                        className={`p-pill ${u.role} select-input`}
                                        value={u.role}
                                        onChange={(e) => handleUpdateUserRole(u.id, e.target.value)}
                                    >
                                        <option value="client">Client</option>
                                        <option value="agent">Agent</option>
                                        <option value="admin">Administrator</option>
                                    </select>
                                </td>
                                <td className="text-right">
                                    <button
                                        className="icon-action-btn delete"
                                        onClick={() => handleDeleteUser(u.id)}
                                        title="Revoke Access"
                                    >
                                        <UserCog size={18} />
                                    </button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </div>
    );

    return (
        <PortalLayout
            activePage="admin"
            title={activeTab === 'overview' ? 'Command Center' : activeTab === 'products' ? 'Inventory Audit' : activeTab === 'orders' ? 'Master Ledger' : 'Stakeholder Directory'}
            subtitle={isAgent ? 'Agent Operations Portal' : 'Central Intelligence & Administrative Controls'}
            tag={isAgent ? 'Agent' : 'System Administrator'}
        >
            <div className="admin-page-content">
                <div className="admin-tab-nav premium-tabs">
                    <button className={`admin-tab-btn ${activeTab === 'overview' ? 'active' : ''}`} onClick={() => { setActiveTab('overview'); setIsEditing(false); }}>
                        <BarChart3 size={18} /> Overview
                    </button>
                    <button className={`admin-tab-btn ${activeTab === 'products' ? 'active' : ''}`} onClick={() => { setActiveTab('products'); setIsEditing(false); }}>
                        <Package size={18} /> Inventory
                    </button>
                    <button className={`admin-tab-btn ${activeTab === 'orders' ? 'active' : ''}`} onClick={() => { setActiveTab('orders'); setIsEditing(false); }}>
                        <TrendingUp size={18} /> Transactions
                    </button>
                    {isAdmin && (
                        <button className={`admin-tab-btn ${activeTab === 'users' ? 'active' : ''}`} onClick={() => { setActiveTab('users'); setIsEditing(false); }}>
                            <Users size={18} /> Directory
                        </button>
                    )}
                </div>

                <AnimatePresence mode="wait">
                    <motion.div
                        key={activeTab}
                        initial={{ opacity: 0, y: 10 }}
                        animate={{ opacity: 1, y: 0 }}
                        exit={{ opacity: 0, y: -10 }}
                        transition={{ duration: 0.2 }}
                    >
                        {activeTab === 'overview' && renderOverview()}
                        {activeTab === 'products' && renderProducts()}
                        {activeTab === 'orders' && renderOrders()}
                        {activeTab === 'users' && renderUsers()}
                    </motion.div>
                </AnimatePresence>
            </div>
        </PortalLayout>
    );
};

export default AdminDashboard;
