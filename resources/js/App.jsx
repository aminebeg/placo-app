import React from 'react';
import { BrowserRouter as Router, Routes, Route, useLocation } from 'react-router-dom';
import { LanguageProvider } from './contexts/LanguageContext';
import { AuthProvider } from './contexts/AuthContext';
import { CartProvider } from './contexts/CartContext';
import Header from './components/Header';
import Footer from './components/Footer';
import Home from './pages/Home';
import Products from './pages/Products';
import About from './pages/About';
import Contact from './pages/Contact';
import Login from './pages/Login';
import Register from './pages/Register';
import Dashboard from './pages/Dashboard';
import Orders from './pages/Orders';
import Cart from './pages/Cart';
import AdminDashboard from './pages/AdminDashboard';
import './index.css';

function AppContent() {
    const location = useLocation();
    const isPortal = location.pathname.startsWith('/dashboard') ||
        location.pathname.startsWith('/admin') ||
        location.pathname.startsWith('/cart') ||
        location.pathname.startsWith('/products') ||
        location.pathname.startsWith('/orders');

    return (
        <div className={isPortal ? "portal-wrapper" : "app"}>
            {!isPortal && <Header />}
            <main className={isPortal ? "portal-main-area" : "main-content"}>
                <Routes>
                    <Route path="/" element={<Home />} />
                    <Route path="/products" element={<Products />} />
                    <Route path="/about" element={<About />} />
                    <Route path="/contact" element={<Contact />} />
                    <Route path="/login" element={<Login />} />
                    <Route path="/register" element={<Register />} />
                    <Route path="/dashboard" element={<Dashboard />} />
                    <Route path="/orders" element={<Orders />} />
                    <Route path="/cart" element={<Cart />} />
                    <Route path="/admin" element={<AdminDashboard />} />
                </Routes>
            </main>
            {!isPortal && <Footer />}
        </div>
    );
}

function App() {
    return (
        <LanguageProvider>
            <AuthProvider>
                <CartProvider>
                    <Router>
                        <AppContent />
                    </Router>
                </CartProvider>
            </AuthProvider>
        </LanguageProvider>
    );
}

export default App;
