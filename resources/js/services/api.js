import axios from 'axios';

// Laravel servers usually run on port 8000
const API_URL = 'http://localhost:8000/api';

const api = axios.create({
    baseURL: API_URL,
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
    },
});

// Add auth token to requests
api.interceptors.request.use((config) => {
    const token = localStorage.getItem('token');
    if (token) {
        config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
});

// Helper to normalized Laravel keys (snake_case) to Frontend keys (camelCase) if needed
// For now, we will update the components to use snake_case or map them here.
// Mapping here is safer to avoid changing all components.

const mapProductFromApi = (p) => ({
    ...p,
    nameEn: p.name_en,
    nameFr: p.name_fr,
    nameAr: p.name_ar,
    descriptionEn: p.description_en,
    descriptionFr: p.description_fr,
    descriptionAr: p.description_ar,
    categoryId: p.category_id,
    inStock: Boolean(p.in_stock),
    imageUrl: p.image_url,
    technicalSheetUrl: p.technical_sheet_url
});

const mapProductToApi = (data) => ({
    ...data,
    name_en: data.nameEn,
    name_fr: data.nameFr,
    name_ar: data.nameAr,
    description_en: data.descriptionEn,
    description_fr: data.descriptionFr,
    description_ar: data.descriptionAr,
    category_id: data.categoryId,
    in_stock: data.inStock,
    image_url: data.imageUrl,
    technical_sheet_url: data.technicalSheetUrl
});

export const authService = {
    login: async (email, password) => {
        const response = await api.post('/login', { email, password });
        if (response.data.token) {
            localStorage.setItem('token', response.data.token);
            localStorage.setItem('user', JSON.stringify(response.data.user));
        }
        return response.data;
    },
    register: async (userData) => {
        const response = await api.post('/register', userData);
        if (response.data.token) {
            localStorage.setItem('token', response.data.token);
            localStorage.setItem('user', JSON.stringify(response.data.user));
        }
        return response.data;
    },
    logout: () => {
        api.post('/logout'); // Fire and forget
        localStorage.removeItem('token');
        localStorage.removeItem('user');
    },
};

export const productService = {
    getAll: async (category, search) => {
        const params = {};
        if (category && category !== 'all') params.category = category;
        if (search) params.search = search;
        const response = await api.get('/products', { params });
        return response.data.map(mapProductFromApi);
    },
    getById: async (id) => {
        const response = await api.get(`/products/${id}`);
        return mapProductFromApi(response.data);
    },
    create: async (data) => {
        const response = await api.post('/products', mapProductToApi(data));
        return mapProductFromApi(response.data);
    },
    update: async (id, data) => {
        const response = await api.put(`/products/${id}`, mapProductToApi(data));
        return mapProductFromApi(response.data);
    },
    delete: async (id) => {
        const response = await api.delete(`/products/${id}`);
        return response.data;
    },
    getCategories: async () => {
        const response = await api.get('/categories');
        return response.data;
    },
};

export const orderService = {
    create: async (orderData) => {
        const response = await api.post('/orders', orderData);
        return response.data;
    },
    getMyOrders: async () => {
        const response = await api.get('/orders');
        return response.data;
    },
    getAllOrders: async () => {
        const response = await api.get('/admin/orders');
        return response.data;
    },
    updateStatus: async (id, status) => {
        const response = await api.patch(`/admin/orders/${id}/status`, { status });
        return response.data;
    },
    createForClient: async (clientId, items, subtotal, total, tax = 0, shipping = 0) => {
        const response = await api.post('/admin/orders/create-for-client', {
            client_id: clientId,
            items,
            subtotal,
            total,
            tax,
            shipping
        });
        return response.data;
    }
};

export const userService = {
    getAll: async () => {
        const response = await api.get('/admin/users');
        return response.data;
    },
    updateRole: async (id, role) => {
        const response = await api.patch(`/admin/users/${id}/role`, { role });
        return response.data;
    },
    delete: async (id) => {
        const response = await api.delete(`/admin/users/${id}`);
        return response.data;
    }
};

export default api;
