<?php

namespace App\src\DAO;

use App\config\Parameter;
use App\src\model\Category;

class CateDAO extends DAO
{

    private function buildObject($row)
    {
        $category = new Category();
        $category->setId($row['id']);
        $category->setName($row['name']);
        $category->setSlug($row['slug']);
        return $category;
    }

    public function getCategories()
    {
        $sql = "SELECT * FROM categories  ORDER BY id DESC";

        $result = $this->createQuery($sql);

        $categories = [];

        foreach ($result as $row) {

            $id = $row['id'];

            $categories[$id] = $this->buildObject($row);
        }

        $result->closeCursor();

        return $categories;
    }

    public function getCategory($id)
    {
        $sql = "SELECT * FROM categories WHERE id = ?";

        $result = $this->createQuery($sql, [$id]);

        $category = $result->fetch();

        $result->closeCursor();

        return $this->buildObject($category);
    }

    public function addCategory(Parameter $category, $id)
    {

        $sql = 'INSERT INTO categories (name, slug) VALUES (?, ?)';

        $this->createQuery($sql, [$category->get('name'), $id, $category->get('slug')]);
    }

    public function editCategory(Parameter $category, $id)
    {
        $sql = 'UPDATE categories SET name = :name, slug = :slug WHERE id=:id';

        $this->createQuery($sql, [

            'name' => $category->get('name'),

            'slug' => $category->get('slug'),

            'id' => $id
        ]);
    }

    public function deleteCategory($id)
    {
        $sql = 'DELETE FROM categories WHERE id = ?';

        $this->createQuery($sql, [$id]);

        $sql = 'DELETE FROM posts WHERE id = ?';

        $this->createQuery($sql, [$id]);
    }


}