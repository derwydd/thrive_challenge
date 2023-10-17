<?php

namespace AppModels\Base;

use \Exception;
use \PDO;
use AppModels\DeliveryCosts as ChildDeliveryCosts;
use AppModels\DeliveryCostsQuery as ChildDeliveryCostsQuery;
use AppModels\Map\DeliveryCostsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `delivery_costs` table.
 *
 * @method     ChildDeliveryCostsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildDeliveryCostsQuery orderByDeliveryName($order = Criteria::ASC) Order by the delivery_name column
 * @method     ChildDeliveryCostsQuery orderByOperator($order = Criteria::ASC) Order by the operator column
 * @method     ChildDeliveryCostsQuery orderByThreshold($order = Criteria::ASC) Order by the threshold column
 * @method     ChildDeliveryCostsQuery orderByCost($order = Criteria::ASC) Order by the cost column
 *
 * @method     ChildDeliveryCostsQuery groupById() Group by the id column
 * @method     ChildDeliveryCostsQuery groupByDeliveryName() Group by the delivery_name column
 * @method     ChildDeliveryCostsQuery groupByOperator() Group by the operator column
 * @method     ChildDeliveryCostsQuery groupByThreshold() Group by the threshold column
 * @method     ChildDeliveryCostsQuery groupByCost() Group by the cost column
 *
 * @method     ChildDeliveryCostsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDeliveryCostsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDeliveryCostsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDeliveryCostsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDeliveryCostsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDeliveryCostsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDeliveryCosts|null findOne(?ConnectionInterface $con = null) Return the first ChildDeliveryCosts matching the query
 * @method     ChildDeliveryCosts findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildDeliveryCosts matching the query, or a new ChildDeliveryCosts object populated from the query conditions when no match is found
 *
 * @method     ChildDeliveryCosts|null findOneById(int $id) Return the first ChildDeliveryCosts filtered by the id column
 * @method     ChildDeliveryCosts|null findOneByDeliveryName(string $delivery_name) Return the first ChildDeliveryCosts filtered by the delivery_name column
 * @method     ChildDeliveryCosts|null findOneByOperator(string $operator) Return the first ChildDeliveryCosts filtered by the operator column
 * @method     ChildDeliveryCosts|null findOneByThreshold(double $threshold) Return the first ChildDeliveryCosts filtered by the threshold column
 * @method     ChildDeliveryCosts|null findOneByCost(double $cost) Return the first ChildDeliveryCosts filtered by the cost column
 *
 * @method     ChildDeliveryCosts requirePk($key, ?ConnectionInterface $con = null) Return the ChildDeliveryCosts by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDeliveryCosts requireOne(?ConnectionInterface $con = null) Return the first ChildDeliveryCosts matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDeliveryCosts requireOneById(int $id) Return the first ChildDeliveryCosts filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDeliveryCosts requireOneByDeliveryName(string $delivery_name) Return the first ChildDeliveryCosts filtered by the delivery_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDeliveryCosts requireOneByOperator(string $operator) Return the first ChildDeliveryCosts filtered by the operator column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDeliveryCosts requireOneByThreshold(double $threshold) Return the first ChildDeliveryCosts filtered by the threshold column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDeliveryCosts requireOneByCost(double $cost) Return the first ChildDeliveryCosts filtered by the cost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDeliveryCosts[]|Collection find(?ConnectionInterface $con = null) Return ChildDeliveryCosts objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildDeliveryCosts> find(?ConnectionInterface $con = null) Return ChildDeliveryCosts objects based on current ModelCriteria
 *
 * @method     ChildDeliveryCosts[]|Collection findById(int|array<int> $id) Return ChildDeliveryCosts objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildDeliveryCosts> findById(int|array<int> $id) Return ChildDeliveryCosts objects filtered by the id column
 * @method     ChildDeliveryCosts[]|Collection findByDeliveryName(string|array<string> $delivery_name) Return ChildDeliveryCosts objects filtered by the delivery_name column
 * @psalm-method Collection&\Traversable<ChildDeliveryCosts> findByDeliveryName(string|array<string> $delivery_name) Return ChildDeliveryCosts objects filtered by the delivery_name column
 * @method     ChildDeliveryCosts[]|Collection findByOperator(string|array<string> $operator) Return ChildDeliveryCosts objects filtered by the operator column
 * @psalm-method Collection&\Traversable<ChildDeliveryCosts> findByOperator(string|array<string> $operator) Return ChildDeliveryCosts objects filtered by the operator column
 * @method     ChildDeliveryCosts[]|Collection findByThreshold(double|array<double> $threshold) Return ChildDeliveryCosts objects filtered by the threshold column
 * @psalm-method Collection&\Traversable<ChildDeliveryCosts> findByThreshold(double|array<double> $threshold) Return ChildDeliveryCosts objects filtered by the threshold column
 * @method     ChildDeliveryCosts[]|Collection findByCost(double|array<double> $cost) Return ChildDeliveryCosts objects filtered by the cost column
 * @psalm-method Collection&\Traversable<ChildDeliveryCosts> findByCost(double|array<double> $cost) Return ChildDeliveryCosts objects filtered by the cost column
 *
 * @method     ChildDeliveryCosts[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildDeliveryCosts> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class DeliveryCostsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \AppModels\Base\DeliveryCostsQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\AppModels\\DeliveryCosts', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDeliveryCostsQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDeliveryCostsQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildDeliveryCostsQuery) {
            return $criteria;
        }
        $query = new ChildDeliveryCostsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildDeliveryCosts|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DeliveryCostsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DeliveryCostsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDeliveryCosts A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, delivery_name, operator, threshold, cost FROM delivery_costs WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildDeliveryCosts $obj */
            $obj = new ChildDeliveryCosts();
            $obj->hydrate($row);
            DeliveryCostsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @return ChildDeliveryCosts|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param array $keys Primary keys to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Collection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param mixed $key Primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        $this->addUsingAlias(DeliveryCostsTableMap::COL_ID, $key, Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param array|int $keys The list of primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        $this->addUsingAlias(DeliveryCostsTableMap::COL_ID, $keys, Criteria::IN);

        return $this;
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterById($id = null, ?string $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(DeliveryCostsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(DeliveryCostsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(DeliveryCostsTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the delivery_name column
     *
     * Example usage:
     * <code>
     * $query->filterByDeliveryName('fooValue');   // WHERE delivery_name = 'fooValue'
     * $query->filterByDeliveryName('%fooValue%', Criteria::LIKE); // WHERE delivery_name LIKE '%fooValue%'
     * $query->filterByDeliveryName(['foo', 'bar']); // WHERE delivery_name IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $deliveryName The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByDeliveryName($deliveryName = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($deliveryName)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(DeliveryCostsTableMap::COL_DELIVERY_NAME, $deliveryName, $comparison);

        return $this;
    }

    /**
     * Filter the query on the operator column
     *
     * Example usage:
     * <code>
     * $query->filterByOperator('fooValue');   // WHERE operator = 'fooValue'
     * $query->filterByOperator('%fooValue%', Criteria::LIKE); // WHERE operator LIKE '%fooValue%'
     * $query->filterByOperator(['foo', 'bar']); // WHERE operator IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $operator The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOperator($operator = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($operator)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(DeliveryCostsTableMap::COL_OPERATOR, $operator, $comparison);

        return $this;
    }

    /**
     * Filter the query on the threshold column
     *
     * Example usage:
     * <code>
     * $query->filterByThreshold(1234); // WHERE threshold = 1234
     * $query->filterByThreshold(array(12, 34)); // WHERE threshold IN (12, 34)
     * $query->filterByThreshold(array('min' => 12)); // WHERE threshold > 12
     * </code>
     *
     * @param mixed $threshold The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByThreshold($threshold = null, ?string $comparison = null)
    {
        if (is_array($threshold)) {
            $useMinMax = false;
            if (isset($threshold['min'])) {
                $this->addUsingAlias(DeliveryCostsTableMap::COL_THRESHOLD, $threshold['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($threshold['max'])) {
                $this->addUsingAlias(DeliveryCostsTableMap::COL_THRESHOLD, $threshold['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(DeliveryCostsTableMap::COL_THRESHOLD, $threshold, $comparison);

        return $this;
    }

    /**
     * Filter the query on the cost column
     *
     * Example usage:
     * <code>
     * $query->filterByCost(1234); // WHERE cost = 1234
     * $query->filterByCost(array(12, 34)); // WHERE cost IN (12, 34)
     * $query->filterByCost(array('min' => 12)); // WHERE cost > 12
     * </code>
     *
     * @param mixed $cost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCost($cost = null, ?string $comparison = null)
    {
        if (is_array($cost)) {
            $useMinMax = false;
            if (isset($cost['min'])) {
                $this->addUsingAlias(DeliveryCostsTableMap::COL_COST, $cost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cost['max'])) {
                $this->addUsingAlias(DeliveryCostsTableMap::COL_COST, $cost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(DeliveryCostsTableMap::COL_COST, $cost, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildDeliveryCosts $deliveryCosts Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($deliveryCosts = null)
    {
        if ($deliveryCosts) {
            $this->addUsingAlias(DeliveryCostsTableMap::COL_ID, $deliveryCosts->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the delivery_costs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DeliveryCostsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DeliveryCostsTableMap::clearInstancePool();
            DeliveryCostsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DeliveryCostsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DeliveryCostsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DeliveryCostsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DeliveryCostsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
