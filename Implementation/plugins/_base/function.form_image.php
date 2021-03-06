<?php

/**
 * Smarty form function for element <input type=image>
 *
 * @param array $params
 * @param object $smarty
 * @return string
 * @author Ivan Meleshko
 * @author Dmitry Kostikov
 */
function smarty_function_form_image($params, &$smarty)
{
	Warecorp::addTranslation('/plugins/function.form_image.php.xml');
    // form object verify
    if (!isset($smarty->_tpl_vars['wf_form_object'])) return Warecorp::t('Form object not found.');
    $form = $smarty->_tpl_vars['wf_form_object'];

    // element default value
    if (isset($form->_defaults[$params['name']]))
        $params['value'] = $form->_defaults[$params['name']];
        
    $content = '<input type=image';
    foreach ($params as $k => &$v) $content .= ' '.$k.'="'.$v.'"';
    $content .= '>';
    
    return $content;
}