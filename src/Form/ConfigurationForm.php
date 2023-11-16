<?php 

declare(strict_types=1);

namespace PrestaShop\Module\sitemapgooglerestrictions\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ConfigurationForm extends AbstractType{
    public function buildform(FormBuilderInterface $builder, array $options){
        dump('form works');
        exit;
    }
}