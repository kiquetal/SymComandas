<?php

/**
 * productos actions.
 *
 * @package    comandas
 * @subpackage productos
 * @author     Kiquetal
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class productosActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->productos = Doctrine_Core::getTable('Producto')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->producto = Doctrine_Core::getTable('Producto')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->producto);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ProductoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProductoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($producto = Doctrine_Core::getTable('Producto')->find(array($request->getParameter('id'))), sprintf('Object producto does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProductoForm($producto);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($producto = Doctrine_Core::getTable('Producto')->find(array($request->getParameter('id'))), sprintf('Object producto does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProductoForm($producto);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($producto = Doctrine_Core::getTable('Producto')->find(array($request->getParameter('id'))), sprintf('Object producto does not exist (%s).', $request->getParameter('id')));
    $producto->delete();

    $this->redirect('productos/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $producto = $form->save();

      $this->redirect('productos/edit?id='.$producto->getId());
    }
  }
}
