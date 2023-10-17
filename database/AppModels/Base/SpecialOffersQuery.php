<?php

namespace AppModels\Base;

use \Exception;
use \PDO;
use AppModels\SpecialOffers as ChildSpecialOffers;
use AppModels\SpecialOffersQuery as ChildSpecialOffersQuery;
use AppModels\Map\SpecialOffersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `special_offers` table.
 *
 * @method     ChildSpecialOffersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSpecialOffersQuery orderByOfferName($order = Criteria::ASC) Order by the offer_name column
 * @method     ChildSpecialOffersQuery orderByOfferCode($order = Criteria::ASC) Order by the offer_code column
 *
 * @method     ChildSpecialOffersQuery groupById() Group by the id column
 * @method     ChildSpecialOffersQuery groupByOfferName() Group by the offer_name column
 * @method     ChildSpecialOffersQuery groupByOfferCode() Group by the offer_code column
 *
 * @method     ChildSpecialOffersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpecialOffersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpecialOffersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpecialOffersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSpecialOffersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSpecialOffersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSpecialOffers|null findOne(?ConnectionInterface $con = null) Return the first ChildSpecialOffers matching the query
 * @method     ChildSpecialOffers findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildSpecialOffers matching the query, or a new ChildSpecialOffers object populated from the query conditions when no match is found
 *
 * @method     ChildSpecialOffers|null findOneById(int $id) Return the first ChildSpecialOffers filtered by the id column
 * @method     ChildSpecialOffers|null findOneByOfferName(string $offer_name) Return the first ChildSpecialOffers filtered by the offer_name column
 * @method     ChildSpecialOffers|null findOneByOfferCode(string $offer_code) Return the first ChildSpecialOffers filtered by the offer_code column
 *
 * @method     ChildSpecialOffers requirePk($key, ?ConnectionInterface $con = null) Return the ChildSpecialOffers by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpecialOffers requireOne(?ConnectionInterface $con = null) Return the first ChildSpecialOffers matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpecialOffers requireOneById(int $id) Return the first ChildSpecialOffers filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpecialOffers requireOneByOfferName(string $offer_name) Return the first ChildSpecialOffers filtered by the offer_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpecialOffers requireOneByOfferCode(string $offer_code) Return the first ChildSpecialOffers filtered by the offer_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpecialOffers[]|Collection find(?ConnectionInterface $con = null) Return ChildSpecialOffers objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildSpecialOffers> find(?ConnectionInterface $con = null) Return ChildSpecialOffers objects based on current ModelCriteria
 *
 * @method     ChildSpecialOffers[]|Collection findById(int|array<int> $id) Return ChildSpecialOffers objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildSpecialOffers> findById(int|array<int> $id) Return ChildSpecialOffers objects filtered by the id column
 * @method     ChildSpecialOffers[]|Collection findByOfferName(string|array<string> $offer_name) Return ChildSpecialOffers objects filtered by the offer_name column
 * @psalm-method Collection&\Traversable<ChildSpecialOffers> findByOfferName(string|array<string> $offer_name) Return ChildSpecialOffers objects filtered by the offer_name column
 * @method     ChildSpecialOffers[]|Collection findByOfferCode(string|array<string> $offer_code) Return ChildSpecialOffers objects filtered by the offer_code column
 * @psalm-method Collection&\Traversable<ChildSpecialOffers> findByOfferCode(string|array<string> $offer_code) Return ChildSpecialOffers objects filtered by the offer_code column
 *
 * @method     ChildSpecialOffers[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildSpecialOffers> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class SpecialOffersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \AppModels\Base\SpecialOffersQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\AppModels\\SpecialOffers', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpecialOffersQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpecialOffersQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildSpecialOffersQuery) {
            return $criteria;
        }
        $query = new ChildSpecialOffersQuery();
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
     * @return ChildSpecialOffers|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpecialOffersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SpecialOffersTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSpecialOffers A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, offer_name, offer_code FROM special_offers WHERE id = :p0';
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
            /** @var ChildSpecialOffers $obj */
            $obj = new ChildSpecialOffers();
            $obj->hydrate($row);
            SpecialOffersTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSpecialOffers|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(SpecialOffersTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(SpecialOffersTableMap::COL_ID, $keys, Criteria::IN);

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
                $this->addUsingAlias(SpecialOffersTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SpecialOffersTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SpecialOffersTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the offer_name column
     *
     * Example usage:
     * <code>
     * $query->filterByOfferName('fooValue');   // WHERE offer_name = 'fooValue'
     * $query->filterByOfferName('%fooValue%', Criteria::LIKE); // WHERE offer_name LIKE '%fooValue%'
     * $query->filterByOfferName(['foo', 'bar']); // WHERE offer_name IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $offerName The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOfferName($offerName = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($offerName)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SpecialOffersTableMap::COL_OFFER_NAME, $offerName, $comparison);

        return $this;
    }

    /**
     * Filter the query on the offer_code column
     *
     * Example usage:
     * <code>
     * $query->filterByOfferCode('fooValue');   // WHERE offer_code = 'fooValue'
     * $query->filterByOfferCode('%fooValue%', Criteria::LIKE); // WHERE offer_code LIKE '%fooValue%'
     * $query->filterByOfferCode(['foo', 'bar']); // WHERE offer_code IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $offerCode The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOfferCode($offerCode = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($offerCode)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SpecialOffersTableMap::COL_OFFER_CODE, $offerCode, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildSpecialOffers $specialOffers Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($specialOffers = null)
    {
        if ($specialOffers) {
            $this->addUsingAlias(SpecialOffersTableMap::COL_ID, $specialOffers->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the special_offers table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpecialOffersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpecialOffersTableMap::clearInstancePool();
            SpecialOffersTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpecialOffersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpecialOffersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpecialOffersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpecialOffersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
