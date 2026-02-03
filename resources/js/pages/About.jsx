import React from 'react';
import { motion } from 'framer-motion';
import { ShieldCheck, Target, History, Users, Globe, Award, TrendingUp, Building2, ChevronRight } from 'lucide-react';
import { useLanguage } from '../contexts/LanguageContext';
import './About.css';

const About = () => {
    const { t } = useLanguage();

    const containerVariants = {
        hidden: { opacity: 0 },
        visible: {
            opacity: 1,
            transition: { staggerChildren: 0.15 }
        }
    };

    const itemVariants = {
        hidden: { y: 20, opacity: 0 },
        visible: {
            y: 0,
            opacity: 1,
            transition: { duration: 0.8, ease: [0.16, 1, 0.3, 1] }
        }
    };

    const values = [
        { icon: <ShieldCheck size={32} />, title: t('about.values.quality'), desc: 'Rigorous testing and international standards compliance.' },
        { icon: <Award size={32} />, title: t('about.values.innovation'), desc: 'Pioneering new drywall attachment systems and profile efficiency.' },
        { icon: <TrendingUp size={32} />, title: t('about.values.integrity'), desc: 'Transparent supply chains and ethical B2B partnerships.' },
        { icon: <Users size={32} />, title: t('about.values.customer'), desc: 'Dedicated logistical support for major construction projects.' }
    ];

    return (
        <div className="about-page">
            {/* Hero Section */}
            <section className="about-hero">
                <div className="container">
                    <motion.div
                        initial={{ opacity: 0, y: 30 }}
                        animate={{ opacity: 1, y: 0 }}
                        transition={{ duration: 1 }}
                    >
                        <span className="section-tag">ESTABLISHED PROFESSIONALISM</span>
                        <h1 className="page-title">OUR <span className="text-gold">LEGACY</span></h1>
                        <p className="page-subtitle">Providing the backbone of modern interior architecture through precision-engineered drywall systems.</p>
                    </motion.div>
                </div>
            </section>

            <div className="container">
                {/* Identity Grid */}
                <motion.section
                    className="identity-section"
                    variants={containerVariants}
                    initial="hidden"
                    whileInView="visible"
                    viewport={{ once: true }}
                >
                    <div className="identity-grid">
                        <motion.div className="identity-card primary" variants={itemVariants}>
                            <div className="card-icon-wrapper">
                                <History size={40} className="text-gold" />
                            </div>
                            <h2 className="card-title">{t('about.history.title')}</h2>
                            <p className="card-text">{t('about.history.description')}</p>
                            <div className="stats-mini">
                                <div className="stat-box">
                                    <span className="stat-num">20+</span>
                                    <span className="stat-lab">Years Experience</span>
                                </div>
                                <div className="stat-divider"></div>
                                <div className="stat-box">
                                    <span className="stat-num">500+</span>
                                    <span className="stat-lab">Major Projects</span>
                                </div>
                            </div>
                        </motion.div>

                        <motion.div className="identity-card" variants={itemVariants}>
                            <div className="card-icon-wrapper">
                                <Target size={40} className="text-gold" />
                            </div>
                            <h2 className="card-title">{t('about.mission.title')}</h2>
                            <p className="card-text">{t('about.mission.description')}</p>
                            <ul className="card-list">
                                <li><ChevronRight size={14} /> Industrial Grade Accessories</li>
                                <li><ChevronRight size={14} /> Supply Chain Reliability</li>
                                <li><ChevronRight size={14} /> Material Certification</li>
                            </ul>
                        </motion.div>
                    </div>
                </motion.section>

                {/* Values Section */}
                <section className="values-section">
                    <motion.h2
                        className="section-title-centered"
                        initial={{ opacity: 0 }}
                        whileInView={{ opacity: 1 }}
                    >
                        THE <span className="text-gold">PILLARS</span> OF OUR OPERATION
                    </motion.h2>

                    <motion.div
                        className="pro-values-grid"
                        variants={containerVariants}
                        initial="hidden"
                        whileInView="visible"
                        viewport={{ once: true }}
                    >
                        {values.map((v, i) => (
                            <motion.div key={i} className="pro-value-card" variants={itemVariants}>
                                <div className="value-icon-box">
                                    {v.icon}
                                </div>
                                <h3>{v.title}</h3>
                                <p>{v.desc}</p>
                            </motion.div>
                        ))}
                    </motion.div>
                </section>

                {/* B2B Vision */}
                <motion.section
                    className="vision-banner"
                    initial={{ opacity: 0, scale: 0.95 }}
                    whileInView={{ opacity: 1, scale: 1 }}
                    transition={{ duration: 1 }}
                >
                    <div className="vision-content">
                        <div className="vision-left">
                            <Building2 size={60} className="text-gold" />
                            <h2>{t('about.vision.title')}</h2>
                        </div>
                        <div className="vision-right">
                            <p>{t('about.vision.description')}</p>
                            <div className="vision-tags">
                                <span className="v-tag">Certified Materials</span>
                                <span className="v-tag">B2B Logistics</span>
                                <span className="v-tag">Architecture Support</span>
                            </div>
                        </div>
                    </div>
                </motion.section>
            </div>
        </div>
    );
};

export default About;
