<?php

namespace AppModels\Map;

use AppModels\DeliveryCosts;
use AppModels\DeliveryCostsQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'delivery_costs' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class DeliveryCostsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'AppModels.Map.DeliveryCostsTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'delivery_costs';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'DeliveryCosts';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\AppModels\\DeliveryCosts';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'AppModels.DeliveryCosts';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the id field
     */
    public const COL_ID = 'delivery_costs.id';

    /**
     * the column name for the delivery_name field
     */
    public const COL_DELIVERY_NAME = 'delivery_costs.delivery_name';

    /**
     * the column name for the operator field
     */
    public const COL_OPERATOR = 'delivery_costs.operator';

    /**
     * the column name for the threshold field
     */
    public const COL_THRESHOLD = 'delivery_costs.threshold';

    /**
     * the column name for the cost field
     */
    public const COL_COST = 'delivery_costs.cost';

    /**
     * The default string format for model objects of the related table
     */
    public const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     *
     * @var array<string, mixed>
     */
    protected static $fieldNames = [
        self::TYPE_PHPNAME       => ['Id', 'DeliveryName', 'Operator', 'Threshold', 'Cost', ],
        self::TYPE_CAMELNAME     => ['id', 'deliveryName', 'operator', 'threshold', 'cost', ],
        self::TYPE_COLNAME       => [DeliveryCostsTableMap::COL_ID, DeliveryCostsTableMap::COL_DELIVERY_NAME, DeliveryCostsTableMap::COL_OPERATOR, DeliveryCostsTableMap::COL_THRESHOLD, DeliveryCostsTableMap::COL_COST, ],
        self::TYPE_FIELDNAME     => ['id', 'delivery_name', 'operator', 'threshold', 'cost', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, ]
    ];

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     *
     * @var array<string, mixed>
     */
    protected static $fieldKeys = [
        self::TYPE_PHPNAME       => ['Id' => 0, 'DeliveryName' => 1, 'Operator' => 2, 'Threshold' => 3, 'Cost' => 4, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'deliveryName' => 1, 'operator' => 2, 'threshold' => 3, 'cost' => 4, ],
        self::TYPE_COLNAME       => [DeliveryCostsTableMap::COL_ID => 0, DeliveryCostsTableMap::COL_DELIVERY_NAME => 1, DeliveryCostsTableMap::COL_OPERATOR => 2, DeliveryCostsTableMap::COL_THRESHOLD => 3, DeliveryCostsTableMap::COL_COST => 4, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'delivery_name' => 1, 'operator' => 2, 'threshold' => 3, 'cost' => 4, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'DeliveryCosts.Id' => 'ID',
        'id' => 'ID',
        'deliveryCosts.id' => 'ID',
        'DeliveryCostsTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'delivery_costs.id' => 'ID',
        'DeliveryName' => 'DELIVERY_NAME',
        'DeliveryCosts.DeliveryName' => 'DELIVERY_NAME',
        'deliveryName' => 'DELIVERY_NAME',
        'deliveryCosts.deliveryName' => 'DELIVERY_NAME',
        'DeliveryCostsTableMap::COL_DELIVERY_NAME' => 'DELIVERY_NAME',
        'COL_DELIVERY_NAME' => 'DELIVERY_NAME',
        'delivery_name' => 'DELIVERY_NAME',
        'delivery_costs.delivery_name' => 'DELIVERY_NAME',
        'Operator' => 'OPERATOR',
        'DeliveryCosts.Operator' => 'OPERATOR',
        'operator' => 'OPERATOR',
        'deliveryCosts.operator' => 'OPERATOR',
        'DeliveryCostsTableMap::COL_OPERATOR' => 'OPERATOR',
        'COL_OPERATOR' => 'OPERATOR',
        'delivery_costs.operator' => 'OPERATOR',
        'Threshold' => 'THRESHOLD',
        'DeliveryCosts.Threshold' => 'THRESHOLD',
        'threshold' => 'THRESHOLD',
        'deliveryCosts.threshold' => 'THRESHOLD',
        'DeliveryCostsTableMap::COL_THRESHOLD' => 'THRESHOLD',
        'COL_THRESHOLD' => 'THRESHOLD',
        'delivery_costs.threshold' => 'THRESHOLD',
        'Cost' => 'COST',
        'DeliveryCosts.Cost' => 'COST',
        'cost' => 'COST',
        'deliveryCosts.cost' => 'COST',
        'DeliveryCostsTableMap::COL_COST' => 'COST',
        'COL_COST' => 'COST',
        'delivery_costs.cost' => 'COST',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function initialize(): void
    {
        // attributes
        $this->setName('delivery_costs');
        $this->setPhpName('DeliveryCosts');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\AppModels\\DeliveryCosts');
        $this->setPackage('AppModels');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('delivery_name', 'DeliveryName', 'VARCHAR', true, 128, null);
        $this->addColumn('operator', 'Operator', 'VARCHAR', true, 128, null);
        $this->addColumn('threshold', 'Threshold', 'FLOAT', true, null, null);
        $this->addColumn('cost', 'Cost', 'FLOAT', true, null, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string|null The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): ?string
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param bool $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass(bool $withPrefix = true): string
    {
        return $withPrefix ? DeliveryCostsTableMap::CLASS_DEFAULT : DeliveryCostsTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array $row Row returned by DataFetcher->fetch().
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array (DeliveryCosts object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = DeliveryCostsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = DeliveryCostsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + DeliveryCostsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = DeliveryCostsTableMap::OM_CLASS;
            /** @var DeliveryCosts $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            DeliveryCostsTableMap::addInstanceToPool($obj, $key);
        }

        return [$obj, $col];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array<object>
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher): array
    {
        $results = [];

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = DeliveryCostsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = DeliveryCostsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var DeliveryCosts $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                DeliveryCostsTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria Object containing the columns to add.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function addSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->addSelectColumn(DeliveryCostsTableMap::COL_ID);
            $criteria->addSelectColumn(DeliveryCostsTableMap::COL_DELIVERY_NAME);
            $criteria->addSelectColumn(DeliveryCostsTableMap::COL_OPERATOR);
            $criteria->addSelectColumn(DeliveryCostsTableMap::COL_THRESHOLD);
            $criteria->addSelectColumn(DeliveryCostsTableMap::COL_COST);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.delivery_name');
            $criteria->addSelectColumn($alias . '.operator');
            $criteria->addSelectColumn($alias . '.threshold');
            $criteria->addSelectColumn($alias . '.cost');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria Object containing the columns to remove.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function removeSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(DeliveryCostsTableMap::COL_ID);
            $criteria->removeSelectColumn(DeliveryCostsTableMap::COL_DELIVERY_NAME);
            $criteria->removeSelectColumn(DeliveryCostsTableMap::COL_OPERATOR);
            $criteria->removeSelectColumn(DeliveryCostsTableMap::COL_THRESHOLD);
            $criteria->removeSelectColumn(DeliveryCostsTableMap::COL_COST);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.delivery_name');
            $criteria->removeSelectColumn($alias . '.operator');
            $criteria->removeSelectColumn($alias . '.threshold');
            $criteria->removeSelectColumn($alias . '.cost');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap(): TableMap
    {
        return Propel::getServiceContainer()->getDatabaseMap(DeliveryCostsTableMap::DATABASE_NAME)->getTable(DeliveryCostsTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a DeliveryCosts or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or DeliveryCosts object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ?ConnectionInterface $con = null): int
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DeliveryCostsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \AppModels\DeliveryCosts) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(DeliveryCostsTableMap::DATABASE_NAME);
            $criteria->add(DeliveryCostsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = DeliveryCostsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            DeliveryCostsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                DeliveryCostsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the delivery_costs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return DeliveryCostsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a DeliveryCosts or Criteria object.
     *
     * @param mixed $criteria Criteria or DeliveryCosts object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DeliveryCostsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from DeliveryCosts object
        }

        if ($criteria->containsKey(DeliveryCostsTableMap::COL_ID) && $criteria->keyContainsValue(DeliveryCostsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.DeliveryCostsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = DeliveryCostsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
