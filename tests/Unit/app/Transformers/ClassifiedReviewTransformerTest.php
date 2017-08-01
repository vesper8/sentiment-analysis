<?php

namespace tests\Unit\App\Transformers;

use App\MovieReview\ReviewDataObjectsFactory;
use App\Transformers\ClassifiedReviewTransformer;
use Tests\TestCase;

class ClassifiedReviewTransformerTest extends TestCase
{
    /**
     * @var ClassifiedReviewTransformer
     */
    protected $transformer;

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->transformer = new ClassifiedReviewTransformer();
    }

    protected function tearDown()
    {
        unset($this->transformer);

        parent::tearDown(); // TODO: Change the autogenerated stub
    }

    public function testTransformMethod()
    {
        $expectedResult = [
            'providedReview' => 'This is a good movie',
            'predictedClass' => 'positive',
            'predictedProbability' => '99.9%',
        ];

        $classifiedReview =
            $this->makeClassifiedReviewUsingArray($expectedResult);

        $this->assertEquals(
            $expectedResult,
            $this->transformer->transform($classifiedReview)
        );
    }

    /**
     * Return ClassifiedReview filled with data from the data array.
     *
     * @param array $data
     * @return \app\MovieReview\ClassifiedReview
     */
    protected function makeClassifiedReviewUsingArray($data)
    {
        $review = (new ReviewDataObjectsFactory())->makeEmptyClassifiedReview();
        $review->setProvidedReviewText($data['providedReview']);
        $review->setPredictedClass($data['predictedClass']);
        $review->setPredictedProbability($data['predictedProbability']);

        return $review;
    }
}
