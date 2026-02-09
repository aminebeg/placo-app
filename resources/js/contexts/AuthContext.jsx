import React, { createContext, useContext, useState, useEffect } from 'react';
import { authService } from '../services/api';

const AuthContext = createContext();

export const useAuth = () => {
    const context = useContext(AuthContext);
    if (!context) {
        throw new Error('useAuth must be used within an AuthProvider');
    }
    return context;
};

export const AuthProvider = ({ children }) => {
    const [user, setUser] = useState(null);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        const storedUser = localStorage.getItem('user');
        const token = localStorage.getItem('token');

        if (storedUser && token) {
            try {
                setUser(JSON.parse(storedUser));
            } catch (error) {
                console.error('Error parsing stored user:', error);
                localStorage.removeItem('user');
                localStorage.removeItem('token');
            }
        }
        setLoading(false);
    }, []);

    const login = async (email, password) => {
        try {
            const data = await authService.login(email, password);
            setUser(data.user);
            localStorage.setItem('user', JSON.stringify(data.user));
            // token is already stored by authService.login
            return data.user;
        } catch (error) {
            throw new Error(error.response?.data?.error || 'Login failed');
        }
    };

    const register = async (userData) => {
        try {
            const data = await authService.register(userData);
            setUser(data.user);
            localStorage.setItem('user', JSON.stringify(data.user));
            // token is already stored by authService.register
            return data.user;
        } catch (error) {
            throw new Error(error.response?.data?.error || 'Registration failed');
        }
    };

    const logout = () => {
        authService.logout();
        setUser(null);
    };

    const updateProfile = (updatedData) => {
        const updatedUser = { ...user, ...updatedData };
        setUser(updatedUser);
        localStorage.setItem('user', JSON.stringify(updatedUser));
    };

    const value = {
        user,
        loading,
        login,
        register,
        logout,
        updateProfile,
        isAuthenticated: !!user,
        isAdmin: user?.role === 'admin',
        isAgent: user?.role === 'agent',
    };

    return <AuthContext.Provider value={value}>{children}</AuthContext.Provider>;
};
