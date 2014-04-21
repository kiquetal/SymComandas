<?php

/**
 * foto actions.
 *
 * @package    comandas
 * @subpackage foto
 * @author     Kiquetal
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class fotoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->productos = Doctrine_Core::getTable('Product')
      ->createQuery('a')
      ->execute();
  }

  public function executeSube(sfWebRequest $request)
  {
      $parametros=$request;
      if ($parametros->isMethod(sfRequest::POST))
      {
          echo 'es post';
      }
      
        $file=$request->getPostParameters();
   //   print_r($file['product']['newPhotos']);
      
      print_r($request->getFiles());
       $uploadDir = sfConfig::get('sf_upload_dir') . '/assets';
       /*
       move_uploaded_file($_FILES['filem']['tmp_name'], $uploadDir . "/" .$_FILES['filem']['name']);
      */
     //['newPhotos'];
      echo ("<pre>");
      var_dump($file);
      echo ("</pre>");
      return sfView::NONE; 
      
  }
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ProductForm();
    
    
    
  if ($request->isMethod(sfRequest::POST))
  {
      $name=$this->form->getName();
      print_r('name');
      print_r($name);
     $this->form->bind($request->getParameter($name), $request->getFiles($name));
      print_r('impirmir post');
      $forms_vals=$this->form->getValues();
      var_dump($forms_vals);
      echo($forms_vals);
      


      //$forms_vals['newPhotos'][0]['filename'];
  
          return sfView::NONE;
  }
    

    
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

    $this->redirect('foto/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $producto = $form->save();

      $this->redirect('foto/edit?id='.$producto->getId());
    }
  }
}
