<?php 
namespace Rest\WebApi\Model;
 
 
class PostManagement {

	public function getPost($first)
	{
		//return 'api GET return the $param ' . $first;
        $first = $collection
        ->getFirstItem()
        ->toArray();

        $columns = array_keys($first);
	}
}

/*
class PostManagement {

	public function getPost($categoryId)
  {
    //$categoryLayer = $this->layerResolver->get()->setCurrentCategory($categoryId);
    $category      = $this->getCategory();

    $filterList       = new FilterList($this->objectManager, $this->fill);
    $filterAttributes = $filterList->getFilters($categoryLayer);
    $filterArray      = [];

    $i = 0;

    foreach ($filterAttributes as $filter) {
        $attributeLabel = (string) $filter->getName();
        $attributeCode  = (string) $filter->getRequestVar();
        $items          = $filter->getItems();
        $filterValues   = [];

        $j = 0;

        foreach ($items as $item) {
            if ($attributeCode == 'cat') {
                $filterValues[$j]['display'] = strip_tags($item->getLabel());
                $filterValues[$j]['value']   = $item->getValue();
            } elseif ($category->getIsAnchor()) {
                if ($filter->getAttributeModel()
                && $filter->getAttributeModel()->getFrontendInput() == 'price') {
                    $filterValues[$j]['min_price'] = $filter->getLayer()->getProductCollection()->getMinPrice();
                    $filterValues[$j]['max_price'] = $filter->getLayer()->getProductCollection()->getMaxPrice();
                    break;
                }

                $filterValues[$j]['display'] = strip_tags($item->getLabel());
                $filterValues[$j]['value']   = $item->getValue();

                // Get Swatches.
                $swatchesValues = $this->getSwatches($filter, $item, $j);
                if (!empty($swatchesValues)) {
                    $filterValues[$j]['swatch_value'] = $swatchesValues['swatch_value'];
                    $filterValues[$j]['swatch_type']  = $swatchesValues['swatch_type'];
                }
            }
            $j++;
        }

        if (!empty($filterValues)) {
            $filterArray['available_filter'][$attributeCode]['label']  = $attributeLabel;
            $filterArray['available_filter'][$attributeCode]['values'] = $filterValues;
        }
        $i++;
    }

    return [$filterArray];
}//end filters()
}
*/

/*
use Rest\WebApi\Api\PostManagementInterface;

class PostManagement implements PostManagementInterface
{

  protected $_request;
  protected $_filterableAttributeList;
  protected $_layerResolver;
  protected $_filterList;
  protected $_storeManagerInterface;
  protected $_response;
  protected $_redirFactory;

  public function __construct(
    \Magento\CatalogGraphQl\Model\Resolver\Layer\FilterableAttributesListFactory $filterableAttributeList,
    \Magento\Catalog\Model\Layer\FilterListFactory $filterList,
    \Magento\Store\Model\StoreManagerInterface $storeManagerInterface,
    \Magento\Catalog\Model\Layer\Resolver $layerResolver,
    \Magento\Framework\Webapi\Rest\Request $request
  )
  {
    $this->_filterList                      = $filterList;
    $this->_filterableAttributeList         = $filterableAttributeList;
    $this->_layerResolver                   = $layerResolver;
    $this->_request                         = $request;
    $this->_storeManagerInterface           = $storeManagerInterface;
  }

  /**
    * GET  review by its ID
    *
    * @api
    * @return array
    * @throws \Magento\Framework\Exception\NoSuchEntityException
    *
    *//*
  public function getLayeredFilters()
  {
    $categoryId   = $this->_request->getParam('categoryId');
    $layer        = $this->_layerResolver->get();


    $layerType = "search";
    if ($categoryId){
      $layer->setCurrentCategory($categoryId);
      $layerType = "category";
    }

    $filterArray['store_id']  = $this->_storeManagerInterface->getStore()->getId();
    $filterableAttributesList = $this->_filterableAttributeList->create($layerType);

    $filterList = $this->_filterList->create(['filterableAttributes' => $filterableAttributesList]);
    $filters    = $filterList->getFilters($layer);
    $i = 0;
    foreach($filters as $filter)
    {
        // Don't show options with no items
      if (! $filter->getItemsCount()) {continue;}

      $availablefilter = (string)$filter->getName();
      $items           = $filter->getItems();
      $filterValues    = array();

      $j = 0;
      foreach($items as $item)
      {
        $filterValues[$j]['display'] = strip_tags($item->getLabel());
        $filterValues[$j]['value']   = $item->getValue();
        $filterValues[$j]['count']   = $item->getCount(); //Gives no. of products in each filter options
        $filterValues[$j]['url']     = $item->getUrl();   //Gives filter url.
        $j++;
      }

      if(!empty($filterValues) && count($filterValues)>1)
      {
        $filterArray['availablefilter'][$availablefilter] =  $filterValues;
      }
      $i++;

    }

    if (!isset($filterArray["availablefilter"])) {
      $filterArray['availablefilter'] = "No filters to show.";
    }

    header("Content-Type: application/json; charset=utf-8");
    $this->response = json_encode($filterArray);
    print_r($this->response,false);
    die();
  }
  public function getPost($param)
  {
      return 'api GET return the $param ' . $param;
  }
}
*/

/*
use Rest\WebApi\Api\PostManagementInterface;

class PostManagement implements PostManagementInterface
{
public function getCategoryFilter($id)
{
    $resultJson = $this->_resultJsonFactory->create();

    $objectManager = \Magento\Framework\App\ObjectManager::getInstance();

    $filterableAttributes = $objectManager->getInstance()->get(\Magento\Catalog\Model\Layer\Category\FilterableAttributeList::class);

    $appState = $objectManager->getInstance()->get(\Magento\Framework\App\State::class);
    $layerResolver = $objectManager->getInstance()->get(\Magento\Catalog\Model\Layer\Resolver::class);
    $filterList = $objectManager->getInstance()->create(
        \Magento\Catalog\Model\Layer\FilterList::class,
        [
            'filterableAttributes' => $filterableAttributes
        ]
    );

    $layer = $layerResolver->get();
    if($id != 0)
    {
        $layer->setCurrentCategory($id);
    }        
    $filters = $filterList->getFilters($layer);
    $maxPrice = $layer->getProductCollection()->getMaxPrice();
    $minPrice = $layer->getProductCollection()->getMinPrice();


    $i = 0;
    $finalFilters = [];
    $uid = 0;
    foreach ($filters as $filter) {
        $uid++;
        $finalFilters[$i]['field'] = $filter->getRequestVar();
        $label = ($filter->getRequestVar() == 'cat') ? 'Category' : $filter->getRequestVar();
        $finalFilters[$i]['id'] = $uid;
        $finalFilters[$i]['label'] = ucfirst($label);
        if($filter->getRequestVar() == "price") {
            $finalFilters[$i]['min-price'] = $minPrice;
            $finalFilters[$i]['max-price'] = $maxPrice;
        }
        $k = 0;
        foreach ($filter->getItems() as $item) {

            $k++;
            $optionLabel = strip_tags($item->getLabel());
            $optionValue = $item->getValue();
            $count = $item->getCount();
            $finalFilters[$i]['value'][] = array('label' => $optionLabel, 'value' => $optionValue,'count' => $count);
        }    
       $i++; 
    } 
    $fil = [];
    foreach ($finalFilters as $fill) {
        if (isset($fill['value']))
            $fil[] = $fill;
    }  
    return $fil;     
}
public function getPost($param)
	{
		return 'api GET return the $param ' . $param;
	}
}
*/

/*







use Exception;
use Magento\Eav\Api\Data\AttributeSetInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Catalog\Api\AttributeSetRepositoryInterface;

class PostManagement
{
    /**
     * @var AttributeSetRepositoryInterface
     *//*
    private $attributeSetRepository;

    /**
     * @var SearchCriteriaBuilder
     *//*
    private $searchCriteriaBuilder;

    public function __construct(
        AttributeSetRepositoryInterface $attributeSetRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->attributeSetRepository = $attributeSetRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * list attribute set
     *
     * @return AttributeSetInterface|null
     *//*
    public function listAttributeSet()
    {
        $attributeSetList = null;
        try {
            $searchCriteria = $this->searchCriteriaBuilder->create();
            $attributeSet = $this->attributeSetRepository->getList($searchCriteria);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        if ($attributeSet->getTotalCount()) {
            $attributeSetList = $attributeSet;            
        }

        return $attributeSetList;
    }
}

*/

/*
use Magento\Catalog\Model\Layer\Category\FilterableAttributeList as CategoryFilterableAttributeList;
use Magento\Catalog\Model\Layer\FilterListFactory;
use Magento\Catalog\Model\Layer\Resolver;
use Magento\Framework\UrlInterface;
class PostManagement {

public function __construct(
    Resolver $layerResolver,
    FilterListFactory $filterListFactory,
    CategoryFilterableAttributeList $categoryFilterableAttributeList,
    UrlInterface $urlBuilder
) {
    $this->_navigation = $navigation;
    $this->layerResolver = $layerResolver;
    $this->filterListFactory = $filterListFactory;
    $this->urlBuilder = $urlBuilder;
    $this->_categoryFilterableAttributeList = $categoryFilterableAttributeList;
}
public function getPost($catid)
{
    $fill_arr = [];

    $filterList = $this->filterListFactory->create(['filterableAttributes' => $this->_categoryFilterableAttributeList]);

    $layer = clone $this->layerResolver->get();
    $layer->setCurrentCategory($catid);
    $filters =  $filterList->getFilters($layer);

    return $fill_arr;
}
}
*/