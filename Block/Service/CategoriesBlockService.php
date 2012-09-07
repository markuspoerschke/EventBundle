<?php

namespace Eluceo\EventBundle\Block\Service;

use Sonata\BlockBundle\Block\BaseBlockService;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\BlockBundle\Model\BlockInterface;
use Symfony\Component\HttpFoundation\Response;
use Sonata\AdminBundle\Validator\ErrorElement;

class CategoriesBlock extends BaseBlockService
{
    /** @var \Eluceo\EventBundle\Model\Manager\CategoryManagerInterface */
    protected $categoryManager;

    function buildEditForm(FormMapper $form, BlockInterface $block)
    {
        // This is a static block
    }

    function execute(BlockInterface $block, Response $response = null)
    {
        $categories = $this->categoryManager->findAll();

        $response = $this->renderResponse(
            'EluceoEventBundle:Block:block_category.html.twig',
            array('categories' => $categories),
            $response
        );

        $response->setMaxAge(3600);
        $response->setPublic();

        return $response;
    }

    function validateBlock(ErrorElement $errorElement, BlockInterface $block)
    {
        // No validation needed
    }

    /**
     * @param \Eluceo\EventBundle\Model\Manager\CategoryManagerInterface $categoryManager
     */
    public function setCategoryManager($categoryManager)
    {
        $this->categoryManager = $categoryManager;
    }

    /**
     * @return \Eluceo\EventBundle\Model\Manager\CategoryManagerInterface
     */
    public function getCategoryManager()
    {
        return $this->categoryManager;
    }
}