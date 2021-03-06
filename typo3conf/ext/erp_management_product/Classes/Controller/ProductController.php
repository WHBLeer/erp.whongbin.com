<?php
namespace ERP\ErpManagementProduct\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Cache\CacheManager;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
require_once ExtensionManagementUtility::extPath('erp_management_interaction') . 'Classes/Library/ErpServerApi.php';

/***
 *
 * This file is part of the "用户管理" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 王宏彬 <wanghongbin816@gmail.com>
 *
 ***/
/**
 * ProductController
 */
class ProductController extends ComController
{

    /**
     * productRepository
     * 
     * @var \ERP\ErpManagementProduct\Domain\Repository\ProductRepository
     * @inject
     */
    protected $productRepository = null;

    /**
     * 产品
     * action list
     * 
     * @param ERP\ErpManagementProduct\Domain\Model\Product
     * @return void
     */
    public function listAction()
    {
        $products = $this->productRepository->findAll();
        $this->view->assign('page', $this->page);
        $this->view->assign('products', $products);
    }

    /**
     * 产品中心
     * action list
     * 
     * @param ERP\ErpManagementProduct\Domain\Model\Product
     * @return void
     */
    public function listZXAction()
    {
        $products = $this->productRepository->findAll();
        $this->view->assign('page', $this->page);
        $this->view->assign('products', $products);
    }

    /**
     * 产品采集
     * action list
     * 
     * @param ERP\ErpManagementProduct\Domain\Model\Product
     * @return void
     */
    public function listCJAction()
    {
        $products = $this->productRepository->findAll();
        $this->view->assign('page', $this->page);
        $this->view->assign('products', $products);
    }

    /**
     * 产品上传
     * action list
     * 
     * @param ERP\ErpManagementProduct\Domain\Model\Product
     * @return void
     */
    public function listSCAction()
    {
        $products = $this->productRepository->findAll();
        $this->view->assign('page', $this->page);
        $this->view->assign('products', $products);
        
    }

    /**
     * 产品回收
     * action list
     * 
     * @param ERP\ErpManagementProduct\Domain\Model\Product
     * @return void
     */
    public function listHSAction()
    {
        $products = $this->productRepository->findAll();
        $this->view->assign('page', $this->page);
        $this->view->assign('products', $products);
    }

    /**
     * 自营产品
     * action list
     * 
     * @param ERP\ErpManagementProduct\Domain\Model\Product
     * @return void
     */
    public function listZYAction()
    {
        $products = $this->productRepository->findAll();
        $this->view->assign('page', $this->page);
        $this->view->assign('products', $products);
    }

    /**
     * 热销产品
     * action list
     * 
     * @param ERP\ErpManagementProduct\Domain\Model\Product
     * @return void
     */
    public function listRXAction()
    {
        $products = $this->productRepository->findAll();
        $this->view->assign('page', $this->page);
        $this->view->assign('products', $products);
    }

    /**
     * action show
     * 
     * @param ERP\ErpManagementProduct\Domain\Model\Product
     * @return void
     */
    public function showAction(\ERP\ErpManagementProduct\Domain\Model\Product $product)
    {
        $this->view->assign('product', $product);
    }

    /**
     * action new
     * 
     * @param ERP\ErpManagementProduct\Domain\Model\Product
     * @return void
     */
    public function newAction()
    {
        $this->view->assign('approvals', $this->getApprovals());
        $this->view->assign('shelvess', $this->getShelves());
        $this->view->assign('gettypes', $this->getGettypes());
    }

    /**
     * action create
     * 
     * @param ERP\ErpManagementProduct\Domain\Model\Product
     * @return void
     */ 
    public function createAction(\ERP\ErpManagementProduct\Domain\Model\Product $product)
    {
        $datas = $this->request->getArguments();
        // dump($datas);exit;
        $product->setCategory($this->getCategoryById($datas['category']));
        $product->setApproval($this->getApprovalById($datas['approval']));
        $product->setShelves($this->getShelvesById($datas['shelves']));
        $product->setGtypes($this->getGettypeById($datas['gtypes']));
        $product->setInfo($this->saveInfo($datas['info']));
        $product->setCost($this->saveCost($datas['cost']));

        //添加介绍
        foreach ($datas['desc'] as $key => $des) {
            $desc = $this->saveDesc($key,$des);
            if ($des['uid']==0) $product->addDescr($desc);
        }
        
        //添加变体
        foreach ($datas['variants'] as $key => $var) { 
            $variant = $this->saveVariants($var);
            if ($var['uid']==0) $product->addVariant($variant);
        }

        $imguids = array_filter(GeneralUtility::trimExplode(',',ltrim($product->getImageuids(),',')));
        if (!empty($imguids)) {
            for ($i = 0; $i < count($imguids); $i++) {
                $image = $this->imagesRepository->findByUid($imguids[$i]);
                if (!$image==false) $product->addImage($image);
                
            }
        }
        // dump($product);exit;
        $this->addFlashMessage('商品信息已存储', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->productRepository->add($product);
        $this->redirect('listZX');
    }

    /**
     * action edit
     * 
     * @param ERP\ErpManagementProduct\Domain\Model\Product
     * @ignorevalidation $product
     * @return void
     */
    public function editAction(\ERP\ErpManagementProduct\Domain\Model\Product $product)
    {
        $this->view->assign('product', $product);
        $this->view->assign('approvals', $this->getApprovals());
        $this->view->assign('shelvess', $this->getShelves());
        $this->view->assign('gettypes', $this->getGettypes());
        $descs = array();
        foreach ($product->getDescr() as $key => $desc) {
            $descs[$desc->getLang()] = $desc;
        }
        $this->view->assign('descs', $descs);
        $this->view->assign('fileurl', $GLOBALS['TYPO3_CONF_VARS']['FTP']['sever']);
    }

    /**
     * action update
     * 
     * @param ERP\ErpManagementProduct\Domain\Model\Product
     * @return void
     */
    public function updateAction(\ERP\ErpManagementProduct\Domain\Model\Product $product)
    {
        $datas = $this->request->getArguments();
        $product->setCategory($this->getCategoryById($datas['category']));
        $product->setApproval($this->getApprovalById($datas['approval']));
        $product->setShelves($this->getShelvesById($datas['shelves']));
        $product->setGtypes($this->getGettypeById($datas['gtypes']));
        $product->setInfo($this->saveInfo($datas['info']));
        $product->setCost($this->saveCost($datas['cost']));
        
        //添加介绍
        foreach ($datas['desc'] as $key => $des) {
            $desc = $this->saveDesc($key,$des);
            if ($des['uid']==0) $product->addDescr($desc);
        }
        
        //添加变体
        foreach ($datas['variants'] as $key => $var) { 
            $variant = $this->saveVariants($var);
            if ($var['uid']==0) $product->addVariant($variant);
        }
        
        $imguids = array_filter(GeneralUtility::trimExplode(',',ltrim($product->getImageuids(),',')));
        if (!empty($imguids)) {
            for ($i = 0; $i < count($imguids); $i++) {
                $image = $this->imagesRepository->findByUid($imguids[$i]);
                if (!$image==false) $product->addImage($image);
                
            }
        }

        $this->addFlashMessage('商品信息已存储', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->productRepository->update($product);
        $this->persistanceManager->persistAll();
        // dump($product);exit;
        $this->redirect('listZX');
    }

    /**
     * action delete
     * 
     * @param ERP\ErpManagementProduct\Domain\Model\Product
     * @return void
     */
    public function deleteAction(\ERP\ErpManagementProduct\Domain\Model\Product $product)
    {
        $this->addFlashMessage('数据已删除!', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->productRepository->remove($product);
        $this->redirect('list');
    }

    /**
     * 批量处理
     * 
     * @return void
     */
    public function batchAction()
    {
        $items = $this->request->hasArgument('datas') ? $this->request->getArgument('datas') : array();
        if ($items['items']) {
            $item = substr($items['items'], 0, strlen($items['items']) - 1);
            $iRet = $this->newsRepository->deleteByUidstring($item);
            if ($iRet > 0) {
                $this->addFlashMessage('删除成功！', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);

                //刷新前台缓存
                GeneralUtility::makeInstance(CacheManager::class)->flushCachesInGroup('pages');
            } else {
                $this->addFlashMessage('删除失败！', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
            }
            $this->redirect('list');
        }
        $this->addFlashMessage('没有可删除对象！', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->redirect('list');
    }

    /**
     * 翻译
     *
     * @return void
     * @author wanghongbin
     * tstamp: 2020-03-19
     */
    public function translateAction()
    {
        file_put_contents('getjosn.log', date('Y-m-d H:i:s') . '==_REQUEST==' . \json_encode($_REQUEST) . chr(10) . chr(10), FILE_APPEND | LOCK_EX);
        $cmd = GeneralUtility::_GP('cmd');
        if ($cmd == 'translate_all') {
            $querys = GeneralUtility::_GP('querys');
            $datas = array();
            $keys = array('title_','keywords_','keypoints_','description_');
            for ($i=0; $i < count($querys); $i++) { 
                $datas[$i] = $this->translate(array(
                    'query'   => $querys[$i],
                    'from'    => isset($_REQUEST['from'])?GeneralUtility::_GP('from'):'auto',
                    'to'      => ['zh','en','fr','de','it','es','ja'],
                    'key'     => $keys[$i]
                ),0);
            }
            JSON($datas);
        }
        if ($cmd == 'translate_item') {
            $query = GeneralUtility::_GP('query');
            $datas = array();
            $datas = $this->translate(array(
                'query'   => $query,
                'from'    => 'auto',
                'to'      => ['zh','en','fr','de','it','es','ja'],
            ),1);
            JSON($datas);
        }
        // $this->translate(array(
        //     'query'   => GeneralUtility::_GP('query'),
        //     'from'    => isset($_REQUEST['form'])?GeneralUtility::_GP('from'):'auto',
        //     'to'      => GeneralUtility::_GP('to')
        // ));
    }

    public function ajaxAction()
    {
        $cmd = GeneralUtility::_GP('cmd');

        // 变体
        if ($cmd == 'getVariant') {
            $pvaId = GeneralUtility::_GP('pvaId');
            $dictitems = $this->getVariant($pvaId);
            $datas = array();
            foreach ($dictitems as $key => $item) {
                $datas[] = array(
                    'uid' => $item->getUid(),
                    'name' => $item->getName(),
                    'code' => $item->getCode(),
                    'parent' => $item->getDicttype()->getUid()
                );
            }
            JSON($datas);
        } 
        // 变体图片
        if ($cmd == 'getVariantImages') {
            $dataid = GeneralUtility::_GP('dataid');
            $datas = $this->getVariantImages($dataid);
            JSON($datas);
        } 

        // 产品id
        if ($cmd == 'queryRange') {
            $beginNumber = GeneralUtility::_GP('beginNumber');
            $endNumber = GeneralUtility::_GP('endNumber');
            $erpuser = $GLOBALS['TSFE']->fe_user->user['uid'];

            $products = $this->productRepository->findAllRange($beginNumber,$endNumber,$erpuser);
            JSON(array_column($products,'uid'));
        } 
        JSON(array('code'=>-1,'message'=>'没有请求的动作'));
    }

    /**
     * 上传商品
     * 
     * @return void
     */
    public function uploadProductAction()
    {
        dump($_GET);
        dump($_POST);
        dump($this->request->getArguments());
        exit;
        $descArr = array();
        foreach ($product->getDescr() as $key => $desc) {
            $descArr[$desc->getLang()] = array(
                'title' => $desc->getTitle(),// 标题
                'keyword' => $desc->getKeyword(),// 关键字
                'keyPoints' => $desc->getKeyPoints(),// 要点说明
                'description' => $desc->getDescription(),// 产品介绍
            );
        }
        $variantsArr = array();
        foreach ($product->getVariants() as $key => $variants) {
            $variantsArr[] = array(
                'combination' => $variants->getCombination(),//组合
                'skuNew' => $variants->getSkuNew(),//sku修正
                'markup' => $variants->getMarkup(),//加价
                'kucun' => $variants->getKucun(),//库存
                'upcEan' => $variants->getUpcEan(),//UPC/EAN
                'images' => $variants->getImages(),//已选图片
            );
        }
        //与服务端数据对接
        $productinfo = array(
            'productId' => $product->getUid(),//数据库主键id
            'numbering' => $product->getNumbering(), //产品编号
            'name' => $product->getName(), //产品名称
            'business' => $product->getBusiness(), //产品主页链接
            'original' => $product->getOriginal(), //原始规格
            'categoryZh' => $product->getCategory()->getName(),//产品分类中文
            'categoryEn' => $product->getCategory()->getNameEn(),//产品分类英文
            'approval' => $product->getApproval()->getCode(),//审核状态(0待审核.1通过.2失效)
            'shelves' => $product->getShelves()->getCode(),//上架状态(4屏蔽,3侵权,2过滤,1下架,0上架)
            'gtypes' => $product->getGtypes()->getCode(),//商品获取类型(5其他,4产品库,3抓取,2海外,1原创,0重点)
            'info' => array(
                'tradeName' => $product->getInfo()->getTradeName(),
                'brandName' => $product->getInfo()->getBrandName(),
                'tradeNum' => $product->getInfo()->getTradeNum(),
                'sku' => $product->getInfo()->getSku(),
                'source' => $product->getInfo()->getSource(),
                'link' => $product->getInfo()->getLink(),
                'code' => $product->getInfo()->getCode(),
                'remark' => $product->getInfo()->getRemark(),
            ),
            'cost' => array(
                'cg' => $product->getCost()->getCg(), //采购价
                'zl' => $product->getCost()->getZl(), //重量
                'cc' => $product->getCost()->getCc(), //尺寸
                'kd' => $product->getCost()->getKd(), //宽度
                'gd' => $product->getCost()->getGd(), //高度
                'yf' => $product->getCost()->getYf(), //国内运费
                'zk' => $product->getCost()->getZk(), //折扣
                'calculation' => $product->getCost()->getCalculation(), //计算结果
                'sy' => $product->getCost()->getSy(), //库存
                'sj' => $product->getCost()->getSj(), //预处理时间
            ),
            'desc' => $descArr,
            'variants' => $variantsArr,
        );
        dump($productinfo);exit;
        // $ErpServer = new \ERP\Api\ErpServer\ErpOrderApi();
        // $res = $ErpServer->getOrdersList(array(
        //     'accountId' => '11cac887243b45f1aee986ac7e04c171',
        //     'productinfo' => $productinfo
        // ));

        $this->addFlashMessage('操作成功, 排队上传中...', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->redirect('listSC');
    }

    /**
     * 产品信息
     * 
     * @param array $data
     * @author wanghongbin
     * @return void
     */
    public function saveInfo(array $data)
    {
        if (isset($data['uid']) && $data['uid']!=0) {
            $info = $this->infoRepository->findByUid($data['uid']);
        } else {
            $info = new \ERP\ErpManagementProduct\Domain\Model\Info();
        }
        $info->setTradeName($data['tradeName']);
        //厂家名称
        $info->setBrandName($data['brandName']);
        //品牌名称
        $info->setTradeNum($data['tradeNum']);
        //厂家编号
        $info->setSku($data['sku']);
        //内部sku
        $info->setSource($data['source']);
        //产品来源
        $info->setLink($data['link']);
        //产品地址
        $info->setCode($data['code']);
        //产品码
        $info->setRemark($data['remark']);
        //备注
        if (isset($data['uid']) && $data['uid']!=0) {
            $this->infoRepository->update($info);
            $this->persistanceManager->persistAll();
            return true;
        } else {
            $this->infoRepository->add($info);
            $this->persistanceManager->persistAll();
            return $info;
        }
    }

    /**
     * 成本运费
     * 
     * @param array $data
     * @author wanghongbin
     * @return void
     */
    public function saveCost(array $data)
    {
        if (isset($data['uid']) && $data['uid']!=0) {
            $cost = $this->costRepository->findByUid($data['uid']);
            $func = 'update';
        } else {
            $cost = new \ERP\ErpManagementProduct\Domain\Model\Cost();
            $func = 'add';
        }
        $cost->setCg($data['cg']);
        //采购价
        $cost->setZl($data['zl']);
        //重量
        $cost->setCc($data['cc']);
        //尺寸
        $cost->setKd($data['kd']);
        //宽度
        $cost->setGd($data['gd']);
        //高度
        $cost->setYf($data['yf']);
        //国内运费
        $cost->setZk($data['zk']);
        //折扣
        $cost->setCalculation($data['calculation']);
        //计算结果
        $cost->setSy($data['sy']);
        //库存
        $cost->setSj($data['sj']);
        //预处理时间

        $this->costRepository->$func($cost);
        $this->persistanceManager->persistAll();
        return $cost;
    }

    /**
     * 产品介绍
     *
     * @param string $lang
     * @param array $data
     * @return void
     * @author wanghongbin
     * tstamp: 2020-03-19
     */
    public function saveDesc(string $lang,array $data)
    {
        $descs = $this->descRepository->findByLang($lang);
        if ($descs->count()>0) {
            $desc = $descs->getFirst();
            $func = 'update';
        } else {
            $desc = new \ERP\ErpManagementProduct\Domain\Model\Desc();
            $func = 'add';
        }
        
        // 标题
        $desc->setTitle($data['title']);
        // 关键字
        $desc->setKeyword($data['keywords']);
        // 要点说明
        $desc->setKeyPoints($data['keypoints']);
        // 产品介绍
        $desc->setDescription($data['description']);
        // 翻译语言
        $desc->setLang($lang);

        $this->descRepository->$func($desc);
        $this->persistanceManager->persistAll();
        return $desc;
    }

    /**
     * 规格变体
     * 
     * @param array $data
     * @author wanghongbin
     * @return void
     */
    public function saveVariants(array $data)
    {
        if (isset($data['uid']) && $data['uid']!=0) {
            $variant = $this->variantsRepository->findByUid($data['uid']);
            $func = 'update';
        } else {
            $variant = new \ERP\ErpManagementProduct\Domain\Model\Variants();
            $func = 'add';
        }
        $variant->setCombination($data['combination']);
        $variant->setSkuNew($data['skunew']);
        $variant->setMarkup($data['markup']);
        $variant->setKucun($data['kucun']);
        $variant->setUpcEan($data['upcean']);
        $variant->setImages($data['images']);
        $this->variantsRepository->$func($variant);
        $this->persistanceManager->persistAll();
        return $variant;
    }
}
