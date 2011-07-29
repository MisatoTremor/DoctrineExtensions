<?php

namespace Sluggable\Fixture\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ODM\Document
 */
class TreeSlug
{
    /**
     * @ODM\Id
     */
    private $id;

    /**
     * @Gedmo\Sluggable(slugField="alias")
     * @ODM\String
     */
    private $title;

    /**
     * @Gedmo\Slug(handlers={
     *      @Gedmo\SlugHandler(class="Gedmo\Sluggable\Handler\TreeSlugHandler", options={
     *          @Gedmo\SlugHandlerOption(name="parentRelation", value="parent"),
     *          @Gedmo\SlugHandlerOption(name="targetField", value="title"),
     *          @Gedmo\SlugHandlerOption(name="separator", value="/")
     *      })
     * }, separator="-", updatable=true)
     * @ODM\String
     */
    private $alias;

    /**
     * @ODM\ReferenceOne(targetDocument="TreeSlug")
     */
    private $parent;

    public function setParent(TreeSlug $parent = null)
    {
        $this->parent = $parent;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getSlug()
    {
        return $this->alias;
    }
}