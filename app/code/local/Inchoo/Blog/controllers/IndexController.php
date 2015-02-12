<?php

class Inchoo_Blog_IndexController
    extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        /*
         * Create new blog post with author and title
         * -this will create new row in inchoo_blog_post_entity table and
         *  two entries for title and author attributes will be saved in inchoo_blog_post_entity_varchar table
         */
        $post = Mage::getModel('inchoo_blog/post');
        $post->setTitle('Test title');
        $post->setAuthor('Zoran Šalamun');
        $post->save();

        /*
         * Try to create post with book type attribute
         * -book type attribute will not be saved because book type attribute is not defined for our entity type
         * -on new row will be added in inchoo_blog_post_entity
         */
        $post = Mage::getModel('inchoo_blog/post');
        $post->setBookType('Test title');
        $post->save();

        /*
         * Getting posts collection
         * -also load collection
         * -this will load all post entries but without attributes
         * -loaded data is only from inchoo_blog_post_entity table
         */
        $posts = Mage::getModel('inchoo_blog/post')->getCollection();
        $posts->load();
        var_dump($posts);

        /*
         * Getting post collection
         * -load all posts
         * -set attributs to be in collection data
         */
        $posts = Mage::getModel('inchoo_blog/post')->getCollection()
                ->addAttributeToSelect('title')
                ->addAttributeToSelect('author');
        $posts->load();
        var_dump($posts);

        /*
         * Load signle post
         * -loading single post will get all attributes that we have set for post
         */
        $post = Mage::getModel('inchoo_blog/post')->load(1);
        var_dump($post);
    }
}