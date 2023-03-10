<?php
namespace Dimarcantonio\ApiCustomEntity\Model;
use Dimarcantonio\ApiCustomEntity\Api\TestInterface;

use Magento\Framework\Exception\LocalizedException;
use Smile\ScopedEav\Api\Data\EntityInterface;
use Magento\Eav\Model\Config;

use Smile\ScopedEav\Model\Entity\Attribute\Backend\Image;

use Magento\Framework\App\ResourceConnection;

use Smile\CustomEntity\Model\CustomEntity;
use Smile\CustomEntity\Api\CustomEntityRepositoryInterface;
/**
 *
 *  File interessanti
 * namespace Smile\ScopedEav\Controller\Adminhtml\Entity\Save;

 */
class Test implements TestInterface
{
    protected $resourceConnection;
    protected  $customEntity;

    private Config $eavConfig;

    protected $customEntityRepositoryInterface;


    public function __construct(
        ResourceConnection $resourceConnection,
        CustomEntity $customEntity,
        Config $eavConfig,
        CustomEntityRepositoryInterface $customEntityRepositoryInterface

    ) {
        $this->customEntity = $customEntity;
        $this->resourceConnection = $resourceConnection;
        $this->eavConfig = $eavConfig;
        $this->customEntityRepositoryInterface = $customEntityRepositoryInterface;

    }

    /**
     * {@inheritdoc}
     */
    public function setData($data)
    {
        echo "prova";
        $entity = $this->customEntity;
        $entity->setDescription('prova');
        $entity->setAttributeSetId(17);
        // $entity->getResource()->getEntityType()->getEntityTypeCode()) -> smile_custom_entity
        $entityType = $this->eavConfig->getEntityType('smile_custom_entity');

        $useDefaults = [];

        foreach ($useDefaults as $attributeCode => $useDefault) {
            if ((bool) $useDefault) {
                $entity->setData($attributeCode, null);
            }
        }

        $data = ['entity' => ['name'=> 'Fattura003','is_active' => 1, 'store_id' => 0, 'url_key' => 'fattura002', 'id_fattura_foscarini' => 324, 'attribute_set_id' =>17, 'description' => 'prova descrizione']];

        foreach ($entityType->getAttributeCollection() as $attributeModel) {
            $attributeCode = $attributeModel->getAttributeCode();
            $backendModel = $attributeModel->getBackend();
            if (isset($data['entity'][$attributeCode]) || !$backendModel instanceof Image) {
                continue;
            }

            $data['entity'][$attributeCode] = '';
        }

        $entity->addData($data['entity']);

        $entity->save();
        exit;
   //     $entity = $this->getEntity();
    //    $entity->save();
        /*
         *  $storeId        = $this->getRequest()->getParam('store', 0);
        $entityId       = $this->getRequest()->getParam('id');
        $attributeSetId = $this->getRequest()->getParam('set');
        $redirectBack   = $this->getRequest()->getParam('back', false);
         */

        /* Array da Costruire
        Array ( [entity] => Array ( [name] => Fattura001 [is_active] => 1 [url_key] => fattura001 [id_fattura_foscarini] => 323 [attribute_set_id] => 17 [description] => ) [form_key] => 9GZ2m8cyB8OmTRYh ) */

        /*
         * CREATE NEW ENTITY
         */

     //   $entity = $this->getEntity();
      //  $entity->save();

        /*$id =  $data['id'];
        $name =$data['name'];
        $number =$data['number'];
        $city =$data['city'];
        //Customize the code as per your requirement.

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('test_table');

        $sql = "Insert Into " . $tableName . " (id, name, number, city) Values ('2','hello','50','Hyderabad')";
        $connection->query($sql);
        return 'successfully saved';*/
    }


    private function getEntity() {


        $data = ['entity' => ['name'=> 'Fattura002','is_active' => 1, 'url_key' => 'fattura002', 'id_fattura_foscarini' => 324, 'attribute_set_id' =>17, 'description' => 'prova descrizione']];
        //$data = $this->imagePreprocessing($entity, $data);

        //$entity->addData($data['entity']);

        //TODO Da capire a cosa serve questo ciclo
        $useDefaults = [];

       /* foreach ($useDefaults as $attributeCode => $useDefault) {
            if ((bool) $useDefault) {
                $entity->setData($attributeCode, null);
            }
        }*/
        //Fine ciclo misterioso

        return []; //$entity;
    }
    /**
     * Sets image attribute data to false if image was removed.
     *
     * @param EntityInterface $entity Current entity.
     * @param array $data Data.
     * @return array
     * @throws LocalizedException
     */
    private function imagePreprocessing(array $data): array
    {
        // @phpstan-ignore-next-line
        $entityType = $this->eavConfig->getEntityType('smile_custom_entity');

        foreach ($entityType->getAttributeCollection() as $attributeModel) {
            $attributeCode = $attributeModel->getAttributeCode();
            $backendModel = $attributeModel->getBackend();
            if (isset($data['entity'][$attributeCode]) || !$backendModel instanceof Image) {
                continue;
            }

            $data['entity'][$attributeCode] = '';
        }

        return $data;
    }


    protected function name() {
        $connection = $this->resourceConnection->getConnection();
        $tableName = $this->resourceConnection->getTableName('smile_custom_entity_varchar'); //gives table name with prefix

        $sql = "Insert Into " . $tableName . " (id, name) Values ('','XYZ')";
        $connection->query($sql);
    }


    /**
     * {@inheritdoc}
     */
    public function updateData($data)
    {
        echo "update";
        $entity = $this->customEntityRepositoryInterface->get(8);
        $entity->setDescription('prova');
        $entity->setAttributeSetId(17);
        // $entity->getResource()->getEntityType()->getEntityTypeCode()) -> smile_custom_entity
        $entityType = $this->eavConfig->getEntityType('smile_custom_entity');

        $useDefaults = [];

        foreach ($useDefaults as $attributeCode => $useDefault) {
            if ((bool) $useDefault) {
                $entity->setData($attributeCode, null);
            }
        }

        $data = ['entity' => ['name'=> 'FatturaUpdate','is_active' => 1, 'store_id' => 0, 'url_key' => 'fattura002', 'id_fattura_foscarini' => 324, 'attribute_set_id' =>17, 'description' => 'prova descrizione']];

        foreach ($entityType->getAttributeCollection() as $attributeModel) {
            $attributeCode = $attributeModel->getAttributeCode();
            $backendModel = $attributeModel->getBackend();
            if (isset($data['entity'][$attributeCode]) || !$backendModel instanceof Image) {
                continue;
            }

            $data['entity'][$attributeCode] = '';
        }

        $entity->addData($data['entity']);

        $entity->save();
        exit;
         }
}
