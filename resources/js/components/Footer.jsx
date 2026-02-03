import React from 'react';
import { Link } from 'react-router-dom';
import { useLanguage } from '../contexts/LanguageContext';
import './Footer.css';

const Footer = () => {
    const { t } = useLanguage();

    return (
        <footer className="footer">
            <div className="footer-main">
                <div className="container">
                    <div className="footer-grid">
                        <div className="footer-col">
                            <h3 className="footer-title">{t('footer.company')}</h3>
                            <ul className="footer-links">
                                <li><Link to="/about">{t('footer.aboutUs')}</Link></li>
                                <li><Link to="/contact">{t('footer.contact')}</Link></li>
                                <li><Link to="/careers">{t('footer.careers')}</Link></li>
                            </ul>
                        </div>

                        <div className="footer-col">
                            <h3 className="footer-title">{t('footer.products')}</h3>
                            <ul className="footer-links">
                                <li><Link to="/products?category=profiles">{t('categories.profiles')}</Link></li>
                                <li><Link to="/products?category=screws">{t('categories.screws')}</Link></li>
                                <li><Link to="/products?category=joints">{t('categories.joints')}</Link></li>
                                <li><Link to="/products?category=tools">{t('categories.tools')}</Link></li>
                            </ul>
                        </div>

                        <div className="footer-col">
                            <h3 className="footer-title">{t('footer.support')}</h3>
                            <ul className="footer-links">
                                <li><Link to="/faq">{t('footer.faq')}</Link></li>
                                <li><Link to="/shipping">{t('footer.shipping')}</Link></li>
                                <li><Link to="/returns">{t('footer.returns')}</Link></li>
                            </ul>
                        </div>

                        <div className="footer-col">
                            <h3 className="footer-title">{t('footer.legal')}</h3>
                            <ul className="footer-links">
                                <li><Link to="/privacy">{t('footer.privacy')}</Link></li>
                                <li><Link to="/terms">{t('footer.terms')}</Link></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div className="footer-bottom">
                <div className="container">
                    <p className="copyright">{t('footer.copyright')}</p>
                </div>
            </div>
        </footer>
    );
};

export default Footer;
