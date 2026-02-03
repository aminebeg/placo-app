<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortalVerificationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Seed some basic data
        $this->admin = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Test',
            'email' => 'admin@placo.com',
            'password' => \Hash::make('admin123'),
            'role' => 'admin',
        ]);

        $this->client = User::create([
            'first_name' => 'Demo',
            'last_name' => 'Client',
            'email' => 'demo@placo.com',
            'password' => \Hash::make('demo123'),
            'role' => 'client',
        ]);

        $this->category = Category::create([
            'name_en' => 'Test Category',
            'name_fr' => 'Catégorie Test',
            'name_ar' => 'فئة الاختبار',
            'slug' => 'test-category'
        ]);

        $this->product = Product::create([
            'name_en' => 'Test Product',
            'name_fr' => 'Produit Test',
            'name_ar' => 'منتج الاختبار',
            'description_en' => 'Test Description EN',
            'description_fr' => 'Test Description FR',
            'description_ar' => 'Test Description AR',
            'category_id' => $this->category->id,
            'price' => 100.00,
            'in_stock' => true
        ]);
    }

    /** @test */
    public function admin_can_login_and_access_admin_dashboard()
    {
        $response = $this->post('/login', [
            'email' => 'admin@placo.com',
            'password' => 'admin123',
        ]);

        $response->assertRedirect('/admin/dashboard');
        $this->assertAuthenticatedAs($this->admin);

        $response = $this->get('/admin/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Command Center');
        $response->assertSee('System Administration');
    }

    /** @test */
    public function client_can_login_and_access_client_dashboard()
    {
        $response = $this->post('/login', [
            'email' => 'demo@placo.com',
            'password' => 'demo123',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($this->client);

        $response = $this->get('/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Operational Overview');
        $response->assertSee('Welcome back, Demo');
    }

    /** @test */
    public function client_can_browse_catalog_and_add_to_cart()
    {
        $this->actingAs($this->client);

        $response = $this->get('/products');
        $response->assertStatus(200);
        $response->assertSee('Technical Catalog');
        $response->assertSee('Test Product');

        // Add to cart
        $response = $this->post(route('cart.add', $this->product->id));
        $response->assertSessionHas('cart');
        
        $cart = session('cart');
        $this->assertArrayHasKey($this->product->id, $cart);
        $this->assertEquals(1, $cart[$this->product->id]['quantity']);
    }

    /** @test */
    public function client_can_checkout_requisition_list()
    {
        $this->actingAs($this->client);
        
        // Setup cart
        session(['cart' => [
            $this->product->id => [
                'name' => 'Test Product',
                'quantity' => 2,
                'price' => 100.00,
                'image' => null
            ]
        ]]);

        $response = $this->post(route('cart.checkout'));
        $response->assertRedirect(route('orders.index'));
        
        $this->assertDatabaseHas('orders', [
            'user_id' => $this->client->id,
            'total' => 238.00,
        ]);

        $this->assertEquals(0, count(session('cart', [])));
    }

    /** @test */
    public function client_can_remove_item_from_cart()
    {
        $this->actingAs($this->client);
        
        session(['cart' => [
            $this->product->id => [
                'name' => 'Test Product',
                'quantity' => 1,
                'price' => 100.00,
                'image' => null
            ]
        ]]);

        $response = $this->delete(route('cart.remove', $this->product->id));
        $response->assertRedirect();
        $this->assertEquals(0, count(session('cart', [])));
    }

    /** @test */
    public function client_can_view_order_details()
    {
        $order = \App\Models\Order::create([
            'user_id' => $this->client->id,
            'order_number' => 'PO-TEST123',
            'status' => 'pending',
            'subtotal' => 100,
            'tax' => 19,
            'shipping' => 0,
            'total' => 119
        ]);

        $this->actingAs($this->client);
        $response = $this->get(route('orders.show', $order->id));
        $response->assertStatus(200);
        $response->assertSee('PO-TEST123');
    }

    /** @test */
    public function admin_can_create_product()
    {
        $this->actingAs($this->admin);

        $response = $this->post(route('products.store'), [
            'name_en' => 'New Product EN',
            'name_fr' => 'New Product FR',
            'name_ar' => 'New Product AR',
            'price' => 150.50,
            'category_id' => $this->category->id,
            'description_en' => 'New Description EN',
            'description_fr' => 'New Description FR',
            'description_ar' => 'New Description AR',
            'in_stock' => 1
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertDatabaseHas('products', ['name_en' => 'New Product EN']);
    }

    /** @test */
    public function admin_can_update_product()
    {
        $this->actingAs($this->admin);

        $response = $this->patch(route('products.update', $this->product->id), [
            'name_en' => 'Updated Product EN',
            'name_fr' => 'Updated Product FR',
            'name_ar' => 'Updated Product AR',
            'price' => 200,
            'category_id' => $this->category->id,
            'description_en' => 'Updated Description EN',
            'description_fr' => 'Updated Description FR',
            'description_ar' => 'Updated Description AR',
            'in_stock' => 0
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertDatabaseHas('products', ['id' => $this->product->id, 'name_en' => 'Updated Product EN', 'in_stock' => 0]);
    }

    /** @test */
    public function admin_can_delete_product()
    {
        $this->actingAs($this->admin);

        $response = $this->delete(route('products.destroy', $this->product->id));
        $response->assertRedirect();
        $this->assertDatabaseMissing('products', ['id' => $this->product->id]);
    }

    /** @test */
    public function admin_can_update_order_status()
    {
        $order = \App\Models\Order::create([
            'user_id' => $this->client->id,
            'order_number' => 'PO-STATUS-TEST',
            'status' => 'pending',
            'subtotal' => 100, 'tax' => 19, 'shipping' => 0, 'total' => 119
        ]);

        $this->actingAs($this->admin);
        $response = $this->patch(route('admin.orders.updateStatus', $order->id), [
            'status' => 'processing'
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('orders', ['id' => $order->id, 'status' => 'processing']);
    }

    /** @test */
    public function admin_can_update_user_role()
    {
        $this->actingAs($this->admin);
        $response = $this->patch(route('admin.users.updateRole', $this->client->id), [
            'role' => 'admin'
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('users', ['id' => $this->client->id, 'role' => 'admin']);
    }

    /** @test */
    public function admin_can_delete_user()
    {
        $userToDelete = User::create([
            'first_name' => 'To', 'last_name' => 'Delete', 'email' => 'delete@me.com', 'password' => 'secret', 'role' => 'client'
        ]);

        $this->actingAs($this->admin);
        $response = $this->delete(route('admin.users.destroy', $userToDelete->id));
        $response->assertRedirect();
        $this->assertDatabaseMissing('users', ['id' => $userToDelete->id]);
    }

    /** @test */
    public function guest_is_redirected_to_login()
    {
        $response = $this->get('/dashboard');
        $response->assertRedirect('/login');
    }

    /** @test */
    public function regular_user_cannot_access_admin_dashboard()
    {
        $this->actingAs($this->client);
        $response = $this->get('/admin/dashboard');
        $response->assertStatus(403); // Or however restricted (web.php says can:admin)
    }

    /** @test */
    public function admin_cannot_delete_themselves()
    {
        $this->actingAs($this->admin);
        $response = $this->delete(route('admin.users.destroy', $this->admin->id));
        
        $response->assertRedirect();
        $this->assertDatabaseHas('users', ['id' => $this->admin->id]);
        $response->assertSessionHas('error', 'You cannot delete yourself.');
    }

    /** @test */
    public function client_cannot_view_others_orders()
    {
        $otherUser = User::create([
            'first_name' => 'Other', 'last_name' => 'User', 'email' => 'other@placo.com', 'password' => 'secret', 'role' => 'client'
        ]);
        $otherOrder = \App\Models\Order::create([
            'user_id' => $otherUser->id, 'order_number' => 'PO-OTHER', 'status' => 'pending',
            'subtotal' => 100, 'tax' => 19, 'shipping' => 0, 'total' => 119
        ]);

        $this->actingAs($this->client);
        $response = $this->get(route('orders.show', $otherOrder->id));
        $response->assertStatus(403);
    }

    /** @test */
    public function user_can_register_via_web()
    {
        $response = $this->post('/register', [
            'first_name' => 'Web',
            'last_name' => 'Registrar',
            'email' => 'webreg@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'company' => 'WebCorp', // Matches AuthController's expected fields
        ]);

        // AuthController->register returns JSON 201. 
        // In a real web app it might redirect, but here it returns JSON.
        $response->assertStatus(201);
        $this->assertDatabaseHas('users', ['email' => 'webreg@example.com']);
    }

    /** @test */
    public function api_protected_routes_require_authentication()
    {
        $response = $this->getJson('/api/orders');
        $response->assertStatus(401);
    }

    /** @test */
    public function api_admin_routes_require_admin_role()
    {
        $token = $this->client->createToken('test-token')->plainTextToken;
        
        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
                         ->getJson('/api/admin/users');
        
        $response->assertStatus(403);
    }

    /** @test */
    public function api_admin_can_update_product()
    {
        $token = $this->admin->createToken('admin-token')->plainTextToken;
        
        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
                         ->putJson("/api/products/{$this->product->id}", [
                            'name_en' => 'API Updated Name',
                            'name_fr' => 'API Updated FR',
                            'name_ar' => 'API Updated AR',
                            'price' => 99.99,
                            'category_id' => $this->category->id,
                            'in_stock' => true
                         ]);
        
        $response->assertStatus(200);
        $this->assertDatabaseHas('products', ['id' => $this->product->id, 'name_en' => 'API Updated Name']);
    }

    /** @test */
    public function api_can_fetch_categories()
    {
        $response = $this->getJson('/api/categories');
        $response->assertStatus(200);
        $response->assertJsonFragment(['slug' => 'test-category']);
    }

    /** @test */
    public function cart_total_calculated_correctly_with_multiple_items()
    {
        $product2 = Product::create([
            'name_en' => 'Second Product', 'name_fr' => 'S2', 'name_ar' => 'S3',
            'description_en' => 'D', 'description_fr' => 'D', 'description_ar' => 'D',
            'category_id' => $this->category->id, 'price' => 50, 'in_stock' => true
        ]);

        $this->actingAs($this->client);
        
        session(['cart' => [
            $this->product->id => ['name' => 'P1', 'quantity' => 1, 'price' => 100, 'image' => null],
            $product2->id => ['name' => 'P2', 'quantity' => 2, 'price' => 50, 'image' => null],
        ]]);

        $response = $this->post(route('cart.checkout'));
        
        // subtotal = 1 * 100 + 2 * 50 = 200
        // tax = 200 * 0.19 = 38
        // total = 238
        $this->assertDatabaseHas('orders', ['total' => 238.00]);
    }

    /** @test */
    public function product_creation_validation_fails_if_fields_missing()
    {
        $this->actingAs($this->admin);
        $response = $this->post(route('products.store'), []); // Empty data
        
        $response->assertSessionHasErrors(['name_en', 'name_fr', 'name_ar', 'price', 'category_id']);
    }

    /** @test */
    public function web_user_can_view_technical_catalog()
    {
        $this->actingAs($this->client);
        $response = $this->get(route('products.index'));
        $response->assertStatus(200);
        $response->assertSee('Material Inventory');
    }

    /** @test */
    public function web_admin_dashboard_shows_correct_tabs()
    {
        $this->actingAs($this->admin);
        $response = $this->get(route('admin.dashboard'));
        $response->assertStatus(200);
        $response->assertSee('Inventory');
        $response->assertSee('Transactions');
        $response->assertSee('Directory');
    }

    /** @test */
    public function language_switcher_works_for_arabic()
    {
        $this->withSession(['locale' => 'ar']);
        $response = $this->get('/');
        $response->assertSee('بوابة B2B المهنية');
        $response->assertSee('dir="rtl"', false); // false to avoid escaping issues
    }

    /** @test */
    public function api_can_fetch_products()
    {
        $response = $this->getJson('/api/products');
        $response->assertStatus(200);
        $response->assertJsonFragment(['name_en' => 'Test Product']);
    }

    /** @test */
    public function api_can_fetch_single_product()
    {
        $response = $this->getJson("/api/products/{$this->product->id}");
        $response->assertStatus(200);
        $response->assertJsonPath('name_en', 'Test Product');
    }

    /** @test */
    public function api_unauthorized_user_cannot_update_product()
    {
        $token = $this->client->createToken('client-token')->plainTextToken;
        
        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
                         ->putJson("/api/products/{$this->product->id}", [
                            'name_en' => 'Hacker Update'
                         ]);
        
        $response->assertStatus(403);
    }

    /** @test */
    public function language_switcher_works()
    {
        $response = $this->get('/language/fr');
        $response->assertSessionHas('locale', 'fr');
        $this->get('/')->assertSee('Revendeurs Agréés Uniquement'); 
    }
}

