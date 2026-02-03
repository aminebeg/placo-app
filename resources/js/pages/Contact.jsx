import React, { useState } from 'react';
import { motion } from 'framer-motion';
import { Mail, Phone, MapPin, Send, MessageSquare, User, Info } from 'lucide-react';
import { useLanguage } from '../contexts/LanguageContext';
import './Contact.css';

const Contact = () => {
    const { t } = useLanguage();
    const [formData, setFormData] = useState({
        name: '',
        email: '',
        subject: '',
        message: '',
    });

    const handleSubmit = (e) => {
        e.preventDefault();
        alert(t('common.success') + '! ' + t('nav.contact'));
        setFormData({ name: '', email: '', subject: '', message: '' });
    };

    const infoItems = [
        {
            icon: <Mail className="text-gold" />,
            title: 'Email',
            content: 'contact@placoplatre.com',
            link: 'mailto:contact@placoplatre.com'
        },
        {
            icon: <Phone className="text-gold" />,
            title: 'Phone',
            content: '+33 1 23 45 67 89',
            link: 'tel:+33123456789'
        },
        {
            icon: <MapPin className="text-gold" />,
            title: 'Address',
            content: '123 Construction Ave, Paris, France',
            link: 'https://maps.google.com'
        }
    ];

    return (
        <div className="contact-page">
            <div className="contact-hero">
                <div className="container">
                    <motion.div
                        initial={{ opacity: 0, y: 20 }}
                        animate={{ opacity: 1, y: 0 }}
                        transition={{ duration: 0.8 }}
                    >
                        <span className="section-tag">{t('nav.contact')}</span>
                        <h1 className="page-title">GET IN <span className="text-gold">TOUCH</span></h1>
                        <p className="page-subtitle">{t('about.subtitle')}</p>
                    </motion.div>
                </div>
            </div>

            <div className="container">
                <div className="contact-layout">
                    {/* Contact Form */}
                    <motion.div
                        className="contact-form-card"
                        initial={{ opacity: 0, x: -30 }}
                        whileInView={{ opacity: 1, x: 0 }}
                        viewport={{ once: true }}
                        transition={{ duration: 0.8, ease: [0.16, 1, 0.3, 1] }}
                    >
                        <div className="form-header">
                            <h2 className="section-title-sm">Send a Message</h2>
                        </div>
                        <form onSubmit={handleSubmit} className="premium-form">
                            <div className="form-row">
                                <div className="form-group">
                                    <label className="form-label">{t('auth.firstName')}</label>
                                    <div className="input-with-icon">
                                        <User size={18} className="input-icon" />
                                        <input
                                            type="text"
                                            className="form-input"
                                            value={formData.name}
                                            onChange={(e) => setFormData({ ...formData, name: e.target.value })}
                                            required
                                            placeholder="Your Name"
                                        />
                                    </div>
                                </div>

                                <div className="form-group">
                                    <label className="form-label">{t('auth.email')}</label>
                                    <div className="input-with-icon">
                                        <Mail size={18} className="input-icon" />
                                        <input
                                            type="email"
                                            className="form-input"
                                            value={formData.email}
                                            onChange={(e) => setFormData({ ...formData, email: e.target.value })}
                                            required
                                            placeholder="your@email.com"
                                        />
                                    </div>
                                </div>
                            </div>

                            <div className="form-group">
                                <label className="form-label">Subject</label>
                                <div className="input-with-icon">
                                    <Info size={18} className="input-icon" />
                                    <input
                                        type="text"
                                        className="form-input"
                                        value={formData.subject}
                                        onChange={(e) => setFormData({ ...formData, subject: e.target.value })}
                                        required
                                        placeholder="Service Inquiry"
                                    />
                                </div>
                            </div>

                            <div className="form-group">
                                <label className="form-label">Message</label>
                                <div className="textarea-wrapper">
                                    <MessageSquare size={18} className="textarea-icon" />
                                    <textarea
                                        className="form-textarea"
                                        value={formData.message}
                                        onChange={(e) => setFormData({ ...formData, message: e.target.value })}
                                        required
                                        rows="6"
                                        placeholder="How can we help with your architectural project?"
                                    />
                                </div>
                            </div>

                            <button type="submit" className="btn btn-primary btn-lg" style={{ width: '100%', marginTop: '20px' }}>
                                {t('common.submit')}
                                <Send size={20} style={{ marginLeft: '10px' }} />
                            </button>
                        </form>
                    </motion.div>

                    {/* Contact Info Sidebar */}
                    <motion.div
                        className="contact-sidebar"
                        initial={{ opacity: 0, x: 30 }}
                        whileInView={{ opacity: 1, x: 0 }}
                        viewport={{ once: true }}
                        transition={{ duration: 0.8, ease: [0.16, 1, 0.3, 1] }}
                    >
                        <div className="info-header">
                            <h2 className="section-title-sm">Quick Contacts</h2>
                            <p className="info-intro">Our expert team is available 24/7 for technical support and inquiries.</p>
                        </div>

                        <div className="info-cards">
                            {infoItems.map((item, index) => (
                                <a key={index} href={item.link} className="info-card-link" target="_blank" rel="noopener noreferrer">
                                    <div className="info-card">
                                        <div className="info-icon-wrapper">
                                            {item.icon}
                                        </div>
                                        <div className="info-content">
                                            <span className="info-title">{item.title}</span>
                                            <span className="info-text">{item.content}</span>
                                        </div>
                                    </div>
                                </a>
                            ))}
                        </div>

                        <div className="support-badge">
                            <span className="badge badge-primary">Professional Support Available</span>
                        </div>
                    </motion.div>
                </div>
            </div>
        </div>
    );
};

export default Contact;
