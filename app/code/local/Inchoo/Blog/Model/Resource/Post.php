<?php

class Inchoo_Blog_Model_Resource_Post
    extends Mage_Eav_Model_Entity_Abstract
{
    /**
     * Resource initialization
     */
    public function __construct()
    {
        $resource = Mage::getSingleton('core/resource');
        $this->setType('inchoo_blog_post');
        $this->setConnection(
            $resource->getConnection('blog_read'),
            $resource->getConnection('blog_write')
        );
    }

    /*
     * Set default attributes
     */
    protected function _getDefaultAttributes()
    {
        return array(
            'entity_type_id',
            'attribute_set_id',
            'created_at',
            'updated_at',
            'increment_id',
            'store_id',
            'website_id'
        );
    }
}