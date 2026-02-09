import React from 'react';
import { Link, useNavigate } from 'react-router-dom';
import {
    LayoutDashboard,
    FileText,
    ClipboardList,
    Package,
    ShieldCheck,
    LogOut,
    Search,
    Bell,
    Building2
} from 'lucide-react';
import { useAuth } from '../contexts/AuthContext';
import { useCart } from '../contexts/CartContext';
import './PortalLayout.css';

const PortalLayout = ({ children, activePage, title, subtitle, tag }) => {
    const { user, isAdmin, isAgent, logout } = useAuth();
    const { cart } = useCart();
    const navigate = useNavigate();

    const showAdminLink = isAdmin || isAgent;

    return (
        <div className="portal-container">
            {/* Professional Sidebar - Centralized */}
            <aside className="portal-sidebar">
                <div className="sidebar-brand">
                    <Building2 className="text-gold" size={24} />
                    <span>PLACO PORTAL <small>B2B</small></span>
                </div>

                <nav className="portal-nav">
                    <div className="sidebar-label">Operations</div>
                    <Link to="/dashboard" className={`portal-nav-item ${activePage === 'dashboard' ? 'active' : ''}`}>
                        <LayoutDashboard size={20} />
                        Operational Overview
                    </Link>
                    <Link to="/orders" className={`portal-nav-item ${activePage === 'orders' ? 'active' : ''}`}>
                        <FileText size={20} />
                        Purchase Orders
                    </Link>
                    <Link to="/cart" className={`portal-nav-item ${activePage === 'cart' ? 'active' : ''}`}>
                        <ClipboardList size={20} />
                        Procurement List
                        {cart.length > 0 && <span className="p-badge">{cart.length}</span>}
                    </Link>
                    <Link to="/products" className={`portal-nav-item ${activePage === 'products' ? 'active' : ''}`}>
                        <Package size={20} />
                        Technical Catalog
                    </Link>

                    {showAdminLink && (
                        <>
                            <div className="sidebar-label">Management</div>
                            <Link to="/admin" className={`portal-nav-item admin-link ${isAgent ? 'agent-link' : ''} ${activePage === 'admin' ? 'active' : ''}`}>
                                <ShieldCheck size={20} className={isAdmin ? 'text-gold' : 'text-blue-500'} />
                                {isAdmin ? 'System Control' : 'Agent Operations'}
                            </Link>
                        </>
                    )}
                </nav>

                <div className="sidebar-footer">
                    <div className="user-context">
                        <div className={`u-avatar ${isAdmin ? 'admin' : ''} ${isAgent ? 'agent' : ''}`}>
                            {user?.firstName?.[0] || 'U'}
                        </div>
                        <div className="u-info">
                            <span className="u-name">{user?.firstName} {user?.lastName}</span>
                            <span className="u-company">{isAdmin ? 'System Administrator' : (isAgent ? 'Operations Agent' : (user?.company || 'Authenticated Contractor'))}</span>
                        </div>
                    </div>
                    <button onClick={logout} className="portal-logout-btn">
                        <LogOut size={18} />
                        Terminate Session
                    </button>
                </div>
            </aside>

            {/* Main Content Area */}
            <main className="portal-main">
                <header className="portal-header">
                    <div className="header-search">
                        <Search size={18} />
                        <input type="text" placeholder="Global asset search..." />
                    </div>
                    <div className="header-actions">
                        <button className="h-icon-btn"><Bell size={20} /></button>
                        <div className="h-divider"></div>
                        <span className="h-date">{new Date().toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</span>
                    </div>
                </header>

                <div className="portal-content">
                    {(title || tag) && (
                        <div className="welcome-banner">
                            {tag && <span className="modal-tag">{tag}</span>}
                            {title && <h1>{title}</h1>}
                            {subtitle && <p>{subtitle}</p>}
                        </div>
                    )}
                    {children}
                </div>
            </main>
        </div>
    );
};

export default PortalLayout;
