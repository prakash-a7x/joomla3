<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

abstract class Mod_latestextensionsHelper
{
    public static function getList(&$params)
    {
        $db = Factory::getDbo();
        $query = $db->getQuery(true);
        $query->select('name, extension_id, type');
        $query->from('#__extensions');
        $query->order('extension_id DESC');
        $db->setQuery($query, 0, $params->get('count', 5));
        try {
            $results = $db->loadObjectList();
        } catch (RuntimeException $e) {
            // JError::raiseError(500, $e->getMessage());
            echo "ERROR! ".$e->getMessage();
            return false;
        }
        foreach ($results as $k => $result) {
            $results[$k] = new stdClass;
            $results[$k]->name = htmlspecialchars($result->name);
            $results[$k]->id = (int)$result->extension_id;
            $results[$k]->type = htmlspecialchars($result->type);
        }
        return $results;
    }
}
