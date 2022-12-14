<?php

namespace Evincemage\CronSet\Controller\Index;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\ResponseInterface;

class ExportCsv extends \Magento\Framework\App\Action\Action
{
    
    protected $fileFactory;

    
    protected $productFactory;

    
    protected $resultLayoutFactory;

    
    protected $csvProcessor;

    
    protected $directoryList;

    
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\App\Response\Http\FileFactory $fileFactory,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory,
        \Magento\Framework\File\Csv $csvProcessor,
        \Magento\Framework\App\Filesystem\DirectoryList $directoryList
    ) {
        $this->fileFactory = $fileFactory;
        $this->productFactory = $productFactory;
        $this->resultLayoutFactory = $resultLayoutFactory;
        $this->csvProcessor = $csvProcessor;
        $this->directoryList = $directoryList;
        parent::__construct($context);
    }

    
    public function execute()
    {
        
        $content[] = [
            'entity_id' => __('Entity ID'),
            'attribute_set_id' => __('Attribute Set ID'),
            'type_id' => __('Type ID'),
            'sku' => __('Sku'),
            'required_options' => __('Required Options'),
            'created_at' => __('Created At'),
            'updated_at' => __('Updated At'),
        ];

        $resultLayout = $this->resultLayoutFactory->create();
        $product = $this->productFactory->create()->getCollection();
        $collection = $this->productFactory->create()->getCollection();
        
        $fileName = 'products.csv'; 

        $filePath =  $this->directoryList->getPath(DirectoryList::VAR_EXPORT) . "/" . $fileName;

        while ($product = $collection->fetchItem()) {
            $content[] = [
                $product->getEntityId(),
                $product->getAttributeSetId(),
                $product->getTypeId(),
                $product->getSku(),
                $product->getRequiredOptions(),
                $product->getCreatedAt(),
                $product->getUpdatedAt()
            ];
        }
        $this->csvProcessor->setEnclosure('"')->setDelimiter(',')->saveData($filePath, $content);
        return $this->fileFactory->create(
            $fileName,
            [
                'type'  => "filename",
                'value' => $fileName,
                'rm'    => false, // True => File will be remove from directory after download.
            ],
            DirectoryList::VAR_EXPORT,
            'text/csv',
            null
        );
    }
}