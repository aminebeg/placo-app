import React, { useState, useEffect } from 'react';
import { Link, useNavigate, useLocation } from 'react-router-dom';
import { motion, AnimatePresence } from 'framer-motion';
import { ShoppingCart, User, LogOut, Menu, X, Globe, Box, ChevronDown, Package } from 'lucide-react';
import { useLanguage } from '../contexts/LanguageContext';
import { useAuth } from '../contexts/AuthContext';
import { useCart } from '../contexts/CartContext';
import './Header.css';

const Header = () => {
    const { language, setLanguage, t } = useLanguage();
    const { user, isAuthenticated, logout } = useAuth();
    const { getCartCount } = useCart();
    const navigate = useNavigate();
    const location = useLocation();
    const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
    const [scrolled, setScrolled] = useState(false);

    useEffect(() => {
        const handleScroll = () => {
            setScrolled(window.scrollY > 20);
        };
        window.addEventListener('scroll', handleScroll);
        return () => window.removeEventListener('scroll', handleScroll);
    }, []);

    const handleLogout = () => {
        logout();
        navigate('/');
        setMobileMenuOpen(false);
    };

    const cartCount = getCartCount();

    const navLinks = [
        { path: '/', label: t('nav.home') },
        { path: '/products', label: t('nav.products') },
        { path: '/about', label: t('nav.about') },
        { path: '/contact', label: t('nav.contact') },
    ];

    return (
        <motion.header
            className={`header ${scrolled ? 'scrolled' : ''}`}
            initial={{ y: -100 }}
            animate={{ y: 0 }}
            transition={{ duration: 0.6, ease: [0.16, 1, 0.3, 1] }}
        >
            <div className="header-top">
                <div className="container">
                    <div className="header-top-content">
                        <div className="language-selector">
                            <Globe size={14} className="globe-icon" />
                            {['en', 'fr', 'ar'].map((lang) => (
                                <button
                                    key={lang}
                                    className={`lang-btn ${language === lang ? 'active' : ''}`}
                                    onClick={() => setLanguage(lang)}
                                >
                                    {lang.toUpperCase()}
                                </button>
                            ))}
                        </div>

                        {isAuthenticated && (
                            <div className="user-welcome">
                                <User size={14} />
                                <span>{t('client.welcome')}, {user.firstName}</span>
                            </div>
                        )}
                    </div>
                </div>
            </div>

            <div className="header-main">
                <div className="container">
                    <div className="header-main-content">
                        <Link to="/" className="logo">
                            <div className="logo-icon-wrapper">
                                <Box className="logo-icon" />
                            </div>
                            <div className="logo-text">
                                <span className="logo-title">PLACO</span>
                                <span className="logo-subtitle">PREMIUM</span>
                            </div>
                        </Link>

                        <nav className="nav desktop-only">
                            {navLinks.map((link) => (
                                <Link
                                    key={link.path}
                                    to={link.path}
                                    className={`nav-link ${location.pathname === link.path ? 'active' : ''}`}
                                >
                                    {link.label}
                                </Link>
                            ))}
                        </nav>

                        <div className="header-actions">
                            {isAuthenticated && (
                                <Link to="/cart" className="cart-btn" title={t('nav.cart')}>
                                    <Package size={22} />
                                    {cartCount > 0 && (
                                        <motion.span
                                            className="cart-badge"
                                            initial={{ scale: 0 }}
                                            animate={{ scale: 1 }}
                                        >
                                            {cartCount}
                                        </motion.span>
                                    )}
                                </Link>
                            )}

                            {isAuthenticated ? (
                                <div className="user-actions">
                                    <Link to="/dashboard" className="account-link">
                                        <User size={18} />
                                        <span className="desktop-only">{t('nav.myAccount')}</span>
                                    </Link>
                                    <button onClick={handleLogout} className="logout-btn" title={t('nav.logout')}>
                                        <LogOut size={18} />
                                    </button>
                                </div>
                            ) : (
                                <Link to="/login" className="btn btn-primary btn-sm login-btn">
                                    {t('nav.login')}
                                </Link>
                            )}

                            <button
                                className="mobile-menu-btn"
                                onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
                            >
                                {mobileMenuOpen ? <X size={24} /> : <Menu size={24} />}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <AnimatePresence>
                {mobileMenuOpen && (
                    <motion.div
                        className="mobile-menu"
                        initial={{ opacity: 0, height: 0 }}
                        animate={{ opacity: 1, height: 'auto' }}
                        exit={{ opacity: 0, height: 0 }}
                    >
                        <div className="container">
                            <div className="mobile-nav">
                                {navLinks.map((link) => (
                                    <Link
                                        key={link.path}
                                        to={link.path}
                                        onClick={() => setMobileMenuOpen(false)}
                                    >
                                        {link.label}
                                    </Link>
                                ))}
                                {isAuthenticated ? (
                                    <>
                                        <Link to="/dashboard" onClick={() => setMobileMenuOpen(false)}>
                                            {t('nav.myAccount')}
                                        </Link>
                                        <button onClick={handleLogout}>{t('nav.logout')}</button>
                                    </>
                                ) : (
                                    <Link to="/login" onClick={() => setMobileMenuOpen(false)}>
                                        {t('nav.login')}
                                    </Link>
                                )}
                            </div>
                        </div>
                    </motion.div>
                )}
            </AnimatePresence>
        </motion.header>
    );
};

export default Header;
