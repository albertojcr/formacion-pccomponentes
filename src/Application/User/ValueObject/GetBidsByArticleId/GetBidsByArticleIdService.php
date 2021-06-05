<?php


namespace IESLaCierva\Application\User\ValueObject\GetBidsByArticleId;


use IESLaCierva\Domain\User\Exceptions\UserNotFoundException;
use IESLaCierva\Domain\User\User;
use IESLaCierva\Domain\User\BidRepository;

class GetBidsByArticleIdService
{
    private BidRepository $bidRepository;

    public function __construct(BidRepository $bidRepository) {
        $this->bidRepository = $bidRepository;
    }
    public function execute(string $id): Bid {
        $bid =  $this->bidRepository->findByArticleId($id);

        if ($bid === null) {
            //throw new UserNotFoundException();
            return "Bid by article id not found";
        }

        return $bid;
    }
}