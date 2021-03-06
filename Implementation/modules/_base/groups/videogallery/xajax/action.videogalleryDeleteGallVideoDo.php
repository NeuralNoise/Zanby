<?php
Warecorp::addTranslation('/modules/groups/videogallery/xajax/action.videogalleryDeleteGallVideoDo.php.xml');

$objResponse = new xajaxResponse();
    
$gallery = Warecorp_Video_Gallery_Factory::loadById($galleryId);
$video = Warecorp_Video_Factory::loadById($videoId);

if ( $gallery->getId() !== null && 
    $video->getId() !== null &&
    Warecorp_Video_AccessManager_Factory::create()->canEditGallery($gallery, $this->currentGroup, $this->_page->_user) ) {

    if (SINGLEVIDEOMODE) {
        $gallery->delete();
        $this->_page->showAjaxAlert(Warecorp::t('Video deleted'));

        /** Send notification to host **/
        $this->currentGroup->sendNewDataIsUploaded( $this->_page->_user, $gallery, "VIDEO", "DELETE", false );
        
//        if ($this->currentGroup->getPrivileges()->getSendEmail()) {
//            $mail = new Warecorp_Mail_Template('template_key', 'GROUP_NEW_DATA_IS_UPLOADED');
//            $mail->setHeader('Sender', '"'.htmlspecialchars($this->currentGroup->getName()).'" <'.$this->currentGroup->getGroupEmail().'>');
//            $mail->setHeader('Reply-To', '"'.htmlspecialchars($this->currentGroup->getName()).'" <'.$this->currentGroup->getGroupEmail().'>');
//            $mail->setSender($this->currentGroup);
//            $mail->addRecipient($this->currentGroup->getHost());
//            $mail->addParam('Group', $this->currentGroup);
//            $mail->addParam('action', "DELETE");
//            $mail->addParam('section', "VIDEO");
//            $mail->addParam('chObject', $gallery);
//            $mail->addParam('User', $this->_page->_user);
//            $mail->addParam('isPlural', false);
//            $mail->sendToPMB(true);
//            $mail->send();
//        }
        /** --- **/

        $_SESSION['AjaxAlertProperty'] = $this->_page->getAjaxAlertProperty();
        $objResponse->addRedirect($this->currentGroup->getGroupPath('videos'));
        return;
    }else{
        $video->delete();
    }

    /** Send notification to host **/
    $this->currentGroup->sendNewDataIsUploaded( $this->_page->_user, $gallery, "VIDEO", "CHANGES", false );
    
//    if ($this->currentGroup->getPrivileges()->getSendEmail()) {
//        $mail = new Warecorp_Mail_Template('template_key', 'GROUP_NEW_DATA_IS_UPLOADED');
//        $mail->setHeader('Sender', '"'.htmlspecialchars($this->currentGroup->getName()).'" <'.$this->currentGroup->getGroupEmail().'>');
//        $mail->setHeader('Reply-To', '"'.htmlspecialchars($this->currentGroup->getName()).'" <'.$this->currentGroup->getGroupEmail().'>');
//        $mail->setSender($this->currentGroup);
//        $mail->addRecipient($this->currentGroup->getHost());
//        $mail->addParam('Group', $this->currentGroup);
//        $mail->addParam('action', "CHANGES");
//        $mail->addParam('section', "VIDEO");
//        $mail->addParam('chObject', $gallery);
//        $mail->addParam('User', $this->_page->_user);
//        $mail->addParam('isPlural', false);
//        $mail->sendToPMB(true);
//        $mail->send();
//    }
    /** --- **/

    $objResponse = $this->videoeditshowpageAction(1, $gallery->getId());
    $objResponse->showAjaxAlert(Warecorp::t('Video deleted'));
} else {
    $objResponse->showAjaxAlert(Warecorp::t('Access denied'));
}
