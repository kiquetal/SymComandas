<?php

/**
 * subproducto actions.
 *
 * @package    comandas
 * @subpackage subproducto
 * @author     Kiquetal
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class subproductoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->sub_productos = Doctrine_Core::getTable('SubProducto')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->sub_producto = Doctrine_Core::getTable('SubProducto')->find(array($request->getParameter('id'),
                                          $request->getParameter('producto_id'),
                                          $request->getParameter('ingredientes_id')));
    $this->forward404Unless($this->sub_producto);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SubProductoForm();
  }

  public function executeHola(sfWebRequest $request)
  {
      
      $parametros=$request;
      if ($parametros->isMethod(sfRequest::POST))
      {
          echo 'es post';
      }
      $subProducto=new SubProducto();
      $subProducto->nombre="asd";
      $subProducto->
      $subProducto->save();
      
      
      print_r($parametros->getPostParameters());

return      sfView::NONE;
      
  }
  
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SubProductoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($sub_producto = Doctrine_Core::getTable('SubProducto')->find(array($request->getParameter('id'),
                    $request->getParameter('producto_id'),
                    $request->getParameter('ingredientes_id'))), sprintf('Object sub_producto does not exist (%s).', $request->getParameter('id'),
                    $request->getParameter('producto_id'),
                    $request->getParameter('ingredientes_id')));
    $this->form = new SubProductoForm($sub_producto);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($sub_producto = Doctrine_Core::getTable('SubProducto')->find(array($request->getParameter('id'),
                    $request->getParameter('producto_id'),
                    $request->getParameter('ingredientes_id'))), sprintf('Object sub_producto does not exist (%s).', $request->getParameter('id'),
                    $request->getParameter('producto_id'),
                    $request->getParameter('ingredientes_id')));
    $this->form = new SubProductoForm($sub_producto);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function execucteRenderno(sfWebRequest $request)
  {
      
            return $this->renderText('No results.');
      
  }
   public function executeBla(sfWebRequest $request)
  {
      
            return $this->renderText("<div>aa</div>");
      
  }
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($sub_producto = Doctrine_Core::getTable('SubProducto')->find(array($request->getParameter('id'),
                    $request->getParameter('producto_id'),
                    $request->getParameter('ingredientes_id'))), sprintf('Object sub_producto does not exist (%s).', $request->getParameter('id'),
                    $request->getParameter('producto_id'),
                    $request->getParameter('ingredientes_id')));
    $sub_producto->delete();

    $this->redirect('subproducto/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $sub_producto = $form->save();

      $this->redirect('subproducto/edit?id='.$sub_producto->getId().'&producto_id='.$sub_producto->getProductoId().'&ingredientes_id='.$sub_producto->getIngredientesId());
    }
  }
  
}
