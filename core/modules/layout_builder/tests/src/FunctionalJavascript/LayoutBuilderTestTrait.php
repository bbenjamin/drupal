<?php

namespace Drupal\Tests\layout_builder\FunctionalJavascript;

/**
 * Trait for Layout Builder Javascript tests.
 */
trait LayoutBuilderTestTrait {

  /**
   * Clicks a category in the block list.
   *
   * @param string $category
   *   The category.
   */
  protected function clickBlockCategory($category) {
    $this->assertSession()->elementExists('css', "#drupal-off-canvas summary:contains('$category')")->click();
  }

  /**
   * Opens all block categories.
   */
  protected function openAllBlockCategories() {
    /** @var \Behat\Mink\Element\DocumentElement $page */
    $page = $this->getSession()->getPage();
    /** @var \Behat\Mink\Element\NodeElement $closed_category_summary */
    foreach ($page->findAll('css', '#drupal-off-canvas .layout-builder-block-categories summary') as $closed_category_summary) {
      if ($closed_category_summary->getAttribute('aria-expanded') === 'false') {
        $closed_category_summary->click();
      }
    }
  }

  /**
   * Asserts that block link is visible.
   *
   * @param string $link_text
   *   The link text.
   */
  protected function assertBlockLinkVisible($link_text) {
    $this->assertTrue($this->getSession()->getPage()->find('css', "#drupal-off-canvas a:contains('$link_text')")->isVisible());
  }

  /**
   * Asserts that block link is not visible.
   *
   * @param string $link_text
   *   The link text.
   */
  protected function assertBlockLinkNotVisible($link_text) {
    $this->assertFalse($this->getSession()->getPage()->find('css', "#drupal-off-canvas a:contains('$link_text')")->isVisible());
  }

}
