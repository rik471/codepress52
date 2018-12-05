<?php

namespace CodePress\CodeCategory\Testing;

use CodePress\CodeCategory\Models\Category;
use CodePress\CodeUser\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminCategoriesTest extends \TestCase
{
    use DatabaseTransactions;

    protected function getUser()
    {
        return factory(User::class)->create();
    }

    public function test_cannot_access_categories()
    {
        $this->visit('/admin/categories')
            ->see('password');
    }

    public function test_can_visit_admin_categories_page()
    {
        $this->actingAs($this->getUser())
            ->visit('/admin/categories')
            ->see('Categories');
    }

    public function test_categories_listing()
    {
        Category::create(['name' => 'Category 1', 'active' => true]);
        Category::create(['name' => 'Category 2', 'active' => true]);
        Category::create(['name' => 'Category 3', 'active' => true]);
        Category::create(['name' => 'Category 4', 'active' => true]);

        $this->actingAs($this->getUser())
            ->visit('/admin/categories')
            ->see('Category 1')
            ->see('Category 2')
            ->see('Category 3')
            ->see('Category 4');

    }

    public function test_click_create_new_category()
    {
        $this->actingAs($this->getUser())
            ->visit('/admin/categories')
            ->click("Create Category")
            ->seePageIs('/admin/categories/create')
            ->see('Create Category');
    }

    public function test_create_new_category()
    {
        $this->actingAs($this->getUser())
            ->visit('/admin/categories/create')
            ->type('Category Test', 'name')
            ->check('active')
            ->press('Create Category')
            ->seePageIs('/admin/categories')
            ->see('Category Test');
    }
}