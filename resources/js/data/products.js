export const products = [
    // Profiles
    {
        id: 'p1',
        name: { en: 'Metal Stud Profile 70mm', fr: 'Montant Métallique 70mm', ar: 'ملف معدني 70 ملم' },
        category: 'profiles',
        price: 12.50,
        currency: 'EUR',
        description: {
            en: 'High-quality galvanized steel stud profile for wall framing. 70mm width, 3m length.',
            fr: 'Montant en acier galvanisé de haute qualité pour ossature murale. Largeur 70mm, longueur 3m.',
            ar: 'ملف فولاذي مجلفن عالي الجودة لإطار الجدران. عرض 70 ملم، طول 3 أمتار.',
        },
        inStock: true,
        image: '/products/profile-70.jpg',
        specs: { width: '70mm', length: '3m', material: 'Galvanized Steel' },
    },
    {
        id: 'p2',
        name: { en: 'Metal Track Profile 70mm', fr: 'Rail Métallique 70mm', ar: 'مسار معدني 70 ملم' },
        category: 'profiles',
        price: 10.80,
        currency: 'EUR',
        description: {
            en: 'Galvanized steel track profile for ceiling and floor mounting. 70mm width, 3m length.',
            fr: 'Rail en acier galvanisé pour montage au plafond et au sol. Largeur 70mm, longueur 3m.',
            ar: 'مسار فولاذي مجلفن للتثبيت على السقف والأرضية. عرض 70 ملم، طول 3 أمتار.',
        },
        inStock: true,
        image: '/products/track-70.jpg',
        specs: { width: '70mm', length: '3m', material: 'Galvanized Steel' },
    },
    {
        id: 'p3',
        name: { en: 'Metal Stud Profile 50mm', fr: 'Montant Métallique 50mm', ar: 'ملف معدني 50 ملم' },
        category: 'profiles',
        price: 9.90,
        currency: 'EUR',
        description: {
            en: 'Lightweight galvanized steel stud profile. 50mm width, 3m length.',
            fr: 'Montant en acier galvanisé léger. Largeur 50mm, longueur 3m.',
            ar: 'ملف فولاذي مجلفن خفيف الوزن. عرض 50 ملم، طول 3 أمتار.',
        },
        inStock: true,
        image: '/products/profile-50.jpg',
        specs: { width: '50mm', length: '3m', material: 'Galvanized Steel' },
    },

    // Screws & Fasteners
    {
        id: 's1',
        name: { en: 'Drywall Screws 3.5x25mm (1000pcs)', fr: 'Vis Placo 3.5x25mm (1000pcs)', ar: 'براغي جبس بورد 3.5×25 ملم (1000 قطعة)' },
        category: 'screws',
        price: 15.50,
        currency: 'EUR',
        description: {
            en: 'Professional grade self-drilling drywall screws. Box of 1000 pieces.',
            fr: 'Vis autoperceuses de qualité professionnelle. Boîte de 1000 pièces.',
            ar: 'براغي ذاتية الحفر احترافية. علبة 1000 قطعة.',
        },
        inStock: true,
        image: '/products/screws-25.jpg',
        specs: { size: '3.5x25mm', quantity: '1000pcs', type: 'Self-drilling' },
    },
    {
        id: 's2',
        name: { en: 'Drywall Screws 3.5x35mm (1000pcs)', fr: 'Vis Placo 3.5x35mm (1000pcs)', ar: 'براغي جبس بورد 3.5×35 ملم (1000 قطعة)' },
        category: 'screws',
        price: 17.20,
        currency: 'EUR',
        description: {
            en: 'Professional grade self-drilling drywall screws for double layers. Box of 1000 pieces.',
            fr: 'Vis autoperceuses de qualité professionnelle pour double couche. Boîte de 1000 pièces.',
            ar: 'براغي ذاتية الحفر احترافية للطبقات المزدوجة. علبة 1000 قطعة.',
        },
        inStock: true,
        image: '/products/screws-35.jpg',
        specs: { size: '3.5x35mm', quantity: '1000pcs', type: 'Self-drilling' },
    },
    {
        id: 's3',
        name: { en: 'Metal Framing Screws 4.2x13mm (500pcs)', fr: 'Vis Métal 4.2x13mm (500pcs)', ar: 'براغي معدنية 4.2×13 ملم (500 قطعة)' },
        category: 'screws',
        price: 12.80,
        currency: 'EUR',
        description: {
            en: 'Self-tapping screws for metal-to-metal connections. Box of 500 pieces.',
            fr: 'Vis autotaraudeuses pour connexions métal-métal. Boîte de 500 pièces.',
            ar: 'براغي ذاتية اللولبة للوصلات المعدنية. علبة 500 قطعة.',
        },
        inStock: true,
        image: '/products/screws-metal.jpg',
        specs: { size: '4.2x13mm', quantity: '500pcs', type: 'Self-tapping' },
    },

    // Joint Compounds
    {
        id: 'j1',
        name: { en: 'Ready-Mix Joint Compound 20kg', fr: 'Enduit Prêt à l\'Emploi 20kg', ar: 'معجون جاهز 20 كجم' },
        category: 'joints',
        price: 18.90,
        currency: 'EUR',
        description: {
            en: 'Premium ready-to-use joint compound for seamless finishing. 20kg bucket.',
            fr: 'Enduit prêt à l\'emploi premium pour finition sans joint. Seau de 20kg.',
            ar: 'معجون جاهز للاستخدام متميز للتشطيب السلس. دلو 20 كجم.',
        },
        inStock: true,
        image: '/products/compound-ready.jpg',
        specs: { weight: '20kg', type: 'Ready-mix', coverage: '8-10m²' },
    },
    {
        id: 'j2',
        name: { en: 'Powder Joint Compound 25kg', fr: 'Enduit en Poudre 25kg', ar: 'معجون بودرة 25 كجم' },
        category: 'joints',
        price: 14.50,
        currency: 'EUR',
        description: {
            en: 'Professional powder joint compound for mixing. 25kg bag.',
            fr: 'Enduit en poudre professionnel à mélanger. Sac de 25kg.',
            ar: 'معجون بودرة احترافي للخلط. كيس 25 كجم.',
        },
        inStock: true,
        image: '/products/compound-powder.jpg',
        specs: { weight: '25kg', type: 'Powder', coverage: '12-15m²' },
    },

    // Tapes & Meshes
    {
        id: 't1',
        name: { en: 'Paper Joint Tape 50m', fr: 'Bande à Joint Papier 50m', ar: 'شريط ورقي 50 متر' },
        category: 'tapes',
        price: 5.90,
        currency: 'EUR',
        description: {
            en: 'High-strength paper joint tape for reinforcing seams. 50mm x 50m roll.',
            fr: 'Bande à joint papier haute résistance pour renforcer les joints. Rouleau 50mm x 50m.',
            ar: 'شريط ورقي عالي القوة لتعزيز الوصلات. لفة 50 ملم × 50 متر.',
        },
        inStock: true,
        image: '/products/tape-paper.jpg',
        specs: { width: '50mm', length: '50m', material: 'Paper' },
    },
    {
        id: 't2',
        name: { en: 'Fiberglass Mesh Tape 45m', fr: 'Bande Fibre de Verre 45m', ar: 'شريط شبكي فايبر 45 متر' },
        category: 'tapes',
        price: 7.50,
        currency: 'EUR',
        description: {
            en: 'Self-adhesive fiberglass mesh tape for crack prevention. 50mm x 45m roll.',
            fr: 'Bande en fibre de verre auto-adhésive pour prévenir les fissures. Rouleau 50mm x 45m.',
            ar: 'شريط شبكي فايبر لاصق ذاتيًا لمنع التشققات. لفة 50 ملم × 45 متر.',
        },
        inStock: true,
        image: '/products/tape-mesh.jpg',
        specs: { width: '50mm', length: '45m', material: 'Fiberglass' },
    },
    {
        id: 't3',
        name: { en: 'Corner Reinforcement Tape 25m', fr: 'Bande de Renfort d\'Angle 25m', ar: 'شريط تعزيز الزوايا 25 متر' },
        category: 'tapes',
        price: 8.90,
        currency: 'EUR',
        description: {
            en: 'Flexible corner reinforcement tape with metal strips. 50mm x 25m roll.',
            fr: 'Bande de renfort d\'angle flexible avec bandes métalliques. Rouleau 50mm x 25m.',
            ar: 'شريط تعزيز زوايا مرن مع شرائط معدنية. لفة 50 ملم × 25 متر.',
        },
        inStock: true,
        image: '/products/tape-corner.jpg',
        specs: { width: '50mm', length: '25m', type: 'Corner reinforcement' },
    },

    // Corner Beads
    {
        id: 'c1',
        name: { en: 'Metal Corner Bead 3m', fr: 'Cornière Métallique 3m', ar: 'زاوية معدنية 3 أمتار' },
        category: 'corners',
        price: 3.20,
        currency: 'EUR',
        description: {
            en: 'Galvanized steel corner bead for perfect edge protection. 3m length.',
            fr: 'Cornière en acier galvanisé pour protection parfaite des arêtes. Longueur 3m.',
            ar: 'زاوية فولاذية مجلفنة لحماية مثالية للحواف. طول 3 أمتار.',
        },
        inStock: true,
        image: '/products/corner-metal.jpg',
        specs: { length: '3m', material: 'Galvanized Steel', angle: '90°' },
    },
    {
        id: 'c2',
        name: { en: 'PVC Corner Bead 3m', fr: 'Cornière PVC 3m', ar: 'زاوية بلاستيكية 3 أمتار' },
        category: 'corners',
        price: 2.80,
        currency: 'EUR',
        description: {
            en: 'Flexible PVC corner bead for curved edges. 3m length.',
            fr: 'Cornière PVC flexible pour arêtes courbes. Longueur 3m.',
            ar: 'زاوية بلاستيكية مرنة للحواف المنحنية. طول 3 أمتار.',
        },
        inStock: true,
        image: '/products/corner-pvc.jpg',
        specs: { length: '3m', material: 'PVC', angle: '90°' },
    },

    // Tools & Accessories
    {
        id: 'to1',
        name: { en: 'Drywall Taping Knife 250mm', fr: 'Couteau à Enduire 250mm', ar: 'سكين معجون 250 ملم' },
        category: 'tools',
        price: 22.50,
        currency: 'EUR',
        description: {
            en: 'Professional stainless steel taping knife with comfortable grip. 250mm blade.',
            fr: 'Couteau à enduire professionnel en acier inoxydable avec poignée confortable. Lame 250mm.',
            ar: 'سكين معجون احترافي من الفولاذ المقاوم للصدأ بمقبض مريح. شفرة 250 ملم.',
        },
        inStock: true,
        image: '/products/knife-250.jpg',
        specs: { size: '250mm', material: 'Stainless Steel', type: 'Taping knife' },
    },
    {
        id: 'to2',
        name: { en: 'Corner Trowel', fr: 'Truelle d\'Angle', ar: 'مجرفة زوايا' },
        category: 'tools',
        price: 18.90,
        currency: 'EUR',
        description: {
            en: 'Precision corner trowel for perfect internal angles. Stainless steel construction.',
            fr: 'Truelle d\'angle de précision pour angles internes parfaits. Construction en acier inoxydable.',
            ar: 'مجرفة زوايا دقيقة للزوايا الداخلية المثالية. مصنوعة من الفولاذ المقاوم للصدأ.',
        },
        inStock: true,
        image: '/products/trowel-corner.jpg',
        specs: { angle: '90°', material: 'Stainless Steel', type: 'Corner trowel' },
    },
    {
        id: 'to3',
        name: { en: 'Screw Gun Attachment', fr: 'Embout Visseuse', ar: 'ملحق مفك كهربائي' },
        category: 'tools',
        price: 12.50,
        currency: 'EUR',
        description: {
            en: 'Depth-adjustable screw gun attachment for consistent screw depth.',
            fr: 'Embout de visseuse à profondeur réglable pour profondeur de vis constante.',
            ar: 'ملحق مفك كهربائي قابل لضبط العمق لعمق برغي ثابت.',
        },
        inStock: true,
        image: '/products/screw-gun.jpg',
        specs: { type: 'Screw gun attachment', adjustable: 'Yes' },
    },

    // Insulation
    {
        id: 'i1',
        name: { en: 'Acoustic Insulation Roll 10m²', fr: 'Rouleau Isolation Acoustique 10m²', ar: 'لفة عزل صوتي 10 متر مربع' },
        category: 'insulation',
        price: 45.00,
        currency: 'EUR',
        description: {
            en: 'High-performance acoustic insulation for soundproofing. 10m² coverage.',
            fr: 'Isolation acoustique haute performance pour insonorisation. Couverture 10m².',
            ar: 'عزل صوتي عالي الأداء للعزل الصوتي. تغطية 10 متر مربع.',
        },
        inStock: true,
        image: '/products/insulation-acoustic.jpg',
        specs: { coverage: '10m²', thickness: '50mm', type: 'Acoustic' },
    },
    {
        id: 'i2',
        name: { en: 'Thermal Insulation Panel 1.2x0.6m', fr: 'Panneau Isolation Thermique 1.2x0.6m', ar: 'لوح عزل حراري 1.2×0.6 متر' },
        category: 'insulation',
        price: 12.90,
        currency: 'EUR',
        description: {
            en: 'Rigid thermal insulation panel for energy efficiency. 1.2m x 0.6m.',
            fr: 'Panneau d\'isolation thermique rigide pour efficacité énergétique. 1.2m x 0.6m.',
            ar: 'لوح عزل حراري صلب لكفاءة الطاقة. 1.2 × 0.6 متر.',
        },
        inStock: true,
        image: '/products/insulation-thermal.jpg',
        specs: { size: '1.2x0.6m', thickness: '40mm', type: 'Thermal' },
    },

    // Adhesives
    {
        id: 'a1',
        name: { en: 'Plasterboard Adhesive 25kg', fr: 'Colle Placo 25kg', ar: 'لاصق جبس بورد 25 كجم' },
        category: 'adhesives',
        price: 16.50,
        currency: 'EUR',
        description: {
            en: 'High-strength adhesive for direct plasterboard mounting. 25kg bag.',
            fr: 'Colle haute résistance pour montage direct de plaques de plâtre. Sac de 25kg.',
            ar: 'لاصق عالي القوة للتثبيت المباشر للجبس بورد. كيس 25 كجم.',
        },
        inStock: true,
        image: '/products/adhesive-plaster.jpg',
        specs: { weight: '25kg', coverage: '4-5m²', type: 'Plasterboard adhesive' },
    },
    {
        id: 'a2',
        name: { en: 'Acoustic Sealant 310ml', fr: 'Mastic Acoustique 310ml', ar: 'مانع تسرب صوتي 310 مل' },
        category: 'adhesives',
        price: 8.90,
        currency: 'EUR',
        description: {
            en: 'Flexible acoustic sealant for sound insulation joints. 310ml cartridge.',
            fr: 'Mastic acoustique flexible pour joints d\'isolation phonique. Cartouche 310ml.',
            ar: 'مانع تسرب صوتي مرن لوصلات العزل الصوتي. خرطوشة 310 مل.',
        },
        inStock: true,
        image: '/products/sealant-acoustic.jpg',
        specs: { volume: '310ml', type: 'Acoustic sealant', color: 'White' },
    },
];

export const getProductById = (id) => {
    return products.find((product) => product.id === id);
};

export const getProductsByCategory = (category) => {
    if (category === 'all') return products;
    return products.filter((product) => product.category === category);
};

export const searchProducts = (query, language = 'en') => {
    const lowerQuery = query.toLowerCase();
    return products.filter((product) =>
        product.name[language].toLowerCase().includes(lowerQuery) ||
        product.description[language].toLowerCase().includes(lowerQuery)
    );
};
