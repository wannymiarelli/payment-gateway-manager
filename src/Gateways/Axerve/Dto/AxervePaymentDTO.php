<?php


namespace AtlasByte\Gateways\Axerve\Dto;


use AtlasByte\Common\BaseDto;

class AxervePaymentDTO extends BaseDto
{

    public ?string $paymentToken;
    public ?string $paymentId;
    public AxerveErrorDTO $error;
    public AxervePaymentURLDTO $userRedirect;

    /**
     * AxervePaymentDTO constructor.
     */
    public function __construct($data) {
        parent::__construct();
        $this->paymentId = $this->readAttribute($data, 'payload.paymentID');
        $this->paymentToken = $this->readAttribute($data, 'payload.paymentToken');
        $this->error = new AxerveErrorDTO(
            $this->readAttribute($data, 'error')
        );
        if ($data->payload->userRedirect) {
            $this->userRedirect = new AxervePaymentURLDTO($this->readAttribute($data, 'payload.userRedirect.href'));
        }
    }

}