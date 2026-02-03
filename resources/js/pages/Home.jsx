import React from 'react';
import { Link } from 'react-router-dom';
import { motion } from 'framer-motion';
import { Shield, Truck, Headset, ArrowRight } from 'lucide-react';
import { useLanguage } from '../contexts/LanguageContext';
import './Home.css';

const Home = () => {
    const { t } = useLanguage();

    const containerVariants = {
        hidden: { opacity: 0 },
        visible: {
            opacity: 1,
            transition: {
                staggerChildren: 0.2
            }
        }
    };

    const itemVariants = {
        hidden: { y: 30, opacity: 0 },
        visible: {
            y: 0,
            opacity: 1,
            transition: { duration: 0.8, ease: [0.16, 1, 0.3, 1] }
        }
    };

    const features = [
        {
            icon: <Shield size={32} />,
            title: t('home.features.quality.title'),
            desc: t('home.features.quality.description')
        },
        {
            icon: <Truck size={32} />,
            title: t('home.features.delivery.title'),
            desc: t('home.features.delivery.description')
        },
        {
            icon: <Headset size={32} />,
            title: t('home.features.support.title'),
            desc: t('home.features.support.description')
        }
    ];

    return (
        <div className="home">
            {/* Hero Section */}
            <section className="hero">
                <div className="hero-background">
                    <div className="hero-pattern"></div>
                    <div className="hero-gradient"></div>
                </div>

                <div className="container">
                    <motion.div
                        className="hero-content"
                        variants={containerVariants}
                        initial="hidden"
                        animate="visible"
                    >
                        <motion.span className="section-tag" variants={itemVariants}>
                            THE ART OF THE INTERIOR ENVELOPE
                        </motion.span>
                        <motion.h1 className="hero-title" variants={itemVariants}>
                            DRYWALL <span>PRECISION</span>
                        </motion.h1>
                        <motion.p className="hero-subtitle" variants={itemVariants}>
                            Premium plasterboard accessories, metal profiles, and finishing systems engineered for the modern architectural professional.
                        </motion.p>
                        <motion.div className="hero-actions" variants={itemVariants}>
                            <Link to="/products" className="btn btn-primary btn-lg">
                                {t('home.hero.cta')}
                                <ArrowRight size={18} />
                            </Link>
                            <Link to="/about" className="btn btn-accent btn-lg">
                                {t('home.hero.ctaSecondary')}
                            </Link>
                        </motion.div>
                    </motion.div>
                </div>
            </section>

            {/* Features Section */}
            <section className="features section-padding">
                <div className="container">
                    <span className="section-tag">{t('home.features.title')}</span>
                    <h2 className="section-title">ENGINEERED FOR QUALITY</h2>

                    <motion.div
                        className="features-grid"
                        variants={containerVariants}
                        initial="hidden"
                        whileInView="visible"
                        viewport={{ once: true }}
                    >
                        {features.map((feature, index) => (
                            <motion.div
                                key={index}
                                className="feature-card"
                                variants={itemVariants}
                            >
                                <div className="feature-icon">
                                    {feature.icon}
                                </div>
                                <h3 className="feature-title">{feature.title}</h3>
                                <p className="feature-description">{feature.desc}</p>
                            </motion.div>
                        ))}
                    </motion.div>
                </div>
            </section>

            {/* CTA Section */}
            <section className="cta-section">
                <div className="container">
                    <motion.div
                        className="cta-card"
                        initial={{ scale: 0.9, opacity: 0 }}
                        whileInView={{ scale: 1, opacity: 1 }}
                        transition={{ duration: 1, ease: [0.16, 1, 0.3, 1] }}
                        viewport={{ once: true }}
                    >
                        <h2 className="cta-title">READY TO START YOUR NEXT PROJECT?</h2>
                        <p className="cta-description">
                            Join thousands of professionals who choose PLACO for their most ambitious architectural projects.
                        </p>
                        <Link to="/register" className="btn btn-primary btn-lg">
                            CREATE PROFESSIONAL ACCOUNT
                        </Link>
                    </motion.div>
                </div>
            </section>
        </div>
    );
};

export default Home;
