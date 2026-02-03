import React, { useState, useEffect } from 'react';
import { Navigate, Link } from 'react-router-dom';
import { motion, AnimatePresence } from 'framer-motion';
import jsPDF from 'jspdf';
import 'jspdf-autotable';
import {
    FileText,
    Download,
    Eye,
    ChevronRight,
    ChevronLeft,
    Filter,
    ArrowUpRight
} from 'lucide-react';
import { useAuth } from '../contexts/AuthContext';
import { useLanguage } from '../contexts/LanguageContext';
import { orderService } from '../services/api';
import PortalLayout from '../components/PortalLayout';
import './Orders.css';

const Orders = () => {
    const { user, isAuthenticated, loading: authLoading } = useAuth();
    const { t } = useLanguage();
    const [orders, setOrders] = useState([]);
    const [loading, setLoading] = useState(true);
    const [searchTerm, setSearchTerm] = useState('');
    const [selectedOrder, setSelectedOrder] = useState(null);
    const [isModalOpen, setIsModalOpen] = useState(false);

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

    const filteredOrders = orders.filter(order => {
        const orderNum = order.orderNumber?.toString() || '';
        const orderStatus = order.status?.toLowerCase() || '';
        const search = searchTerm.toLowerCase();

        return orderNum.includes(search) || orderStatus.includes(search);
    });

    const activeOrders = orders.filter(o => o.status !== 'delivered');
    const totalValuation = orders.reduce((acc, o) => acc + Number(o.total || 0), 0);

    const handleExportCSV = () => {
        const headers = ['PO Reference', 'Date', 'Status', 'Total (€)'];
        const csvContent = [
            headers.join(','),
            ...orders.map(o => `#PO-${o.orderNumber},${new Date(o.createdAt).toLocaleDateString()},${o.status},${o.total}`)
        ].join('\n');

        const blob = new Blob([csvContent], { type: 'text/csv' });
        const url = window.URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.setAttribute('hidden', '');
        a.setAttribute('href', url);
        a.setAttribute('download', `Procurement_Ledger_${new Date().toISOString().split('T')[0]}.csv`);
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    };

    const handleInspect = (order) => {
        setSelectedOrder(order);
        setIsModalOpen(true);
    };

    const handleDownloadInvoice = (order) => {
        const doc = new jsPDF();

        // Add Branding
        doc.setFontSize(22);
        doc.setTextColor(197, 160, 89); // Gold accent
        doc.text('PLACO PORTAL B2B', 14, 22);

        // Add PO Info
        doc.setFontSize(10);
        doc.setTextColor(100);
        doc.text(`Official Purchase Order Ledger`, 14, 30);
        doc.text(`Generated: ${new Date().toLocaleString()}`, 14, 35);

        // Horizontal Line
        doc.setDrawColor(220);
        doc.line(14, 40, 196, 40);

        // Business Context
        doc.setFontSize(12);
        doc.setTextColor(0);
        doc.text('CONTRACTOR DETAILS', 14, 50);
        doc.setFontSize(10);
        doc.text(`Company: ${user?.company || 'Authenticated Contractor'}`, 14, 58);
        doc.text(`Account Holder: ${user?.firstName} ${user?.lastName}`, 14, 63);
        doc.text(`Email: ${user?.email}`, 14, 68);

        doc.setFontSize(12);
        doc.text('ORDER SPECIFICATIONS', 120, 50);
        doc.setFontSize(10);
        doc.text(`PO Reference: #PO-${order.orderNumber}`, 120, 58);
        doc.text(`Status: ${order.status.toUpperCase()}`, 120, 63);
        doc.text(`Transaction Date: ${new Date(order.createdAt).toLocaleDateString()}`, 120, 68);

        // Product Table
        const tableData = order.items?.map(item => [
            item.product_name || `PID: ${item.product_id}`,
            item.quantity,
            `${Number(item.price).toFixed(2)} EUR`,
            `${Number(item.price * item.quantity).toFixed(2)} EUR`
        ]) || [];

        doc.autoTable({
            startY: 80,
            head: [['Material Specification', 'Qty', 'Unit Price', 'Extension']],
            body: tableData,
            headStyles: { fillColor: [28, 28, 30], textColor: [197, 160, 89] },
            foot: [['', '', 'GROSS TOTAL', `${Number(order.total).toFixed(2)} EUR`]],
            footStyles: { fillColor: [248, 248, 248], textColor: [0], fontStyle: 'bold' },
            theme: 'grid'
        });

        const finalY = doc.lastAutoTable.finalY + 10;
        doc.setFontSize(8);
        doc.setTextColor(150);
        doc.text('This is an electronically generated business document.', 14, finalY);
        doc.text('Conformity certificates for these items are available in your operational hub.', 14, finalY + 5);

        doc.save(`Purchase_Order_#PO-${order.orderNumber}.pdf`);
    };

    if (authLoading) return <div className="portal-loader-overlay"><div className="portal-loader"></div></div>;
    if (!isAuthenticated) return <Navigate to="/login" />;

    return (
        <PortalLayout
            activePage="orders"
            title="Transaction Ledger"
            subtitle={<>Strategic audit trail for <strong>{user?.company || 'Professional Account'}</strong></>}
        >
            <div className="orders-page-content">
                <div className="dashboard-action-bar top-aligned">
                    <div className="ledger-stats">
                        <div className="stat-item">
                            <span className="stat-label">Total Transactions</span>
                            <span className="stat-value">{orders.length} Records</span>
                        </div>
                        <div className="stat-item">
                            <span className="stat-label">Portfolio Valuation</span>
                            <span className="stat-value gold">{totalValuation.toFixed(2)} €</span>
                        </div>
                        <div className="stat-item">
                            <span className="stat-label">Active Transmissions</span>
                            <span className="stat-value">{activeOrders.length} Pending</span>
                        </div>
                    </div>
                    <div className="header-actions">
                        <button className="portal-ghost-btn" onClick={handleExportCSV}><Download size={16} /> Export Ledger (CSV)</button>
                    </div>
                </div>

                <div className="portal-card full-width">
                    <div className="card-header">
                        <div className="header-left">
                            <h2>Audit Log</h2>
                            <span className="item-count-tag">{filteredOrders.length} Matches Found</span>
                        </div>
                        <div className="header-actions">
                            <button className="portal-ghost-btn sm" onClick={() => alert('Filter engine initializing...')}><Filter size={14} /> Refine Period</button>
                        </div>
                    </div>

                    <div className="data-table-wrapper">
                        {loading ? (
                            <div className="portal-table-loading">
                                <div className="portal-loader sm"></div>
                            </div>
                        ) : filteredOrders.length === 0 ? (
                            <div className="table-empty">
                                <FileText size={48} className="text-gold" />
                                <p>No transactions found in this audit period.</p>
                                <Link to="/products" className="txt-btn">Open Procurement Catalog <ArrowUpRight size={14} /></Link>
                            </div>
                        ) : (
                            <table className="portal-table">
                                <thead>
                                    <tr>
                                        <th>REFERENCE</th>
                                        <th>TIMESTAMP</th>
                                        <th>LOGISTICS STATUS</th>
                                        <th className="text-right">VALUATION</th>
                                        <th className="text-right">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <AnimatePresence>
                                        {filteredOrders.map(order => (
                                            <motion.tr
                                                key={order.id}
                                                initial={{ opacity: 0 }}
                                                animate={{ opacity: 1 }}
                                                exit={{ opacity: 0 }}
                                            >
                                                <td className="font-mono">#PO-{order.orderNumber}</td>
                                                <td>
                                                    <div className="date-cell">
                                                        <span className="primary-date">{new Date(order.createdAt).toLocaleDateString()}</span>
                                                        <span className="secondary-time">{new Date(order.createdAt).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span className={`p-pill ${order.status}`}>
                                                        {order.status}
                                                    </span>
                                                </td>
                                                <td className="text-right font-bold">
                                                    {Number(order.total).toFixed(2)} €
                                                </td>
                                                <td className="text-right">
                                                    <div className="action-cell">
                                                        <button
                                                            className="icon-action-btn"
                                                            title="Inspect PO"
                                                            onClick={() => handleInspect(order)}
                                                        >
                                                            <Eye size={18} />
                                                        </button>
                                                        <button
                                                            className="icon-action-btn"
                                                            title="Download Official Invoice"
                                                            onClick={() => handleDownloadInvoice(order)}
                                                        >
                                                            <Download size={18} />
                                                        </button>
                                                    </div>
                                                </td>
                                            </motion.tr>
                                        ))}
                                    </AnimatePresence>
                                </tbody>
                            </table>
                        )}
                    </div>

                    <div className="table-pagination">
                        <button className="pagi-btn" disabled><ChevronLeft size={16} /></button>
                        <span className="pagi-info">Page 1 of 1</span>
                        <button className="pagi-btn" disabled><ChevronRight size={16} /></button>
                    </div>
                </div>
            </div>

            {/* Order Inspection Modal */}
            <AnimatePresence>
                {isModalOpen && selectedOrder && (
                    <div className="portal-modal-overlay">
                        <motion.div
                            className="portal-modal-card"
                            initial={{ opacity: 0, scale: 0.95, y: 20 }}
                            animate={{ opacity: 1, scale: 1, y: 0 }}
                            exit={{ opacity: 0, scale: 0.95, y: 20 }}
                        >
                            <div className="modal-header">
                                <div className="header-context">
                                    <span className="modal-tag">Detailed Audit</span>
                                    <h2>PO Reference: #PO-{selectedOrder.orderNumber}</h2>
                                </div>
                                <button className="close-btn" onClick={() => setIsModalOpen(false)}>×</button>
                            </div>

                            <div className="modal-body">
                                <div className="audit-summary-grid">
                                    <div className="audit-box">
                                        <span className="a-label">Compliance Status</span>
                                        <span className={`p-pill ${selectedOrder.status}`}>{selectedOrder.status}</span>
                                    </div>
                                    <div className="audit-box">
                                        <span className="a-label">Transaction Date</span>
                                        <span className="a-value">{new Date(selectedOrder.createdAt).toLocaleString()}</span>
                                    </div>
                                    <div className="audit-box">
                                        <span className="a-label">Settlement Amount</span>
                                        <span className="a-value gold">{Number(selectedOrder.total).toFixed(2)} €</span>
                                    </div>
                                </div>

                                <div className="audit-items-table">
                                    <h3>Components & Materials</h3>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Material Identifier</th>
                                                <th>Quantity</th>
                                                <th className="text-right">Unit Price</th>
                                                <th className="text-right">Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {selectedOrder.items?.map((item, idx) => (
                                                <tr key={idx}>
                                                    <td>
                                                        <div className="material-info">
                                                            <span className="m-name">{item.product_name || `Product ID: ${item.product_id}`}</span>
                                                            <span className="m-ref">SKU: {item.product_id}</span>
                                                        </div>
                                                    </td>
                                                    <td className="font-bold">{item.quantity} units</td>
                                                    <td className="text-right">{Number(item.price).toFixed(2)} €</td>
                                                    <td className="text-right font-bold">{Number(item.price * item.quantity).toFixed(2)} €</td>
                                                </tr>
                                            ))}
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div className="modal-footer">
                                <button className="portal-ghost-btn" onClick={() => handleDownloadInvoice(selectedOrder)}>
                                    <Download size={16} /> Download Formal PDF
                                </button>
                                <button className="portal-primary-btn" onClick={() => setIsModalOpen(false)}>
                                    Close Inspection
                                </button>
                            </div>
                        </motion.div>
                    </div>
                )}
            </AnimatePresence>
        </PortalLayout>
    );
};

export default Orders;
