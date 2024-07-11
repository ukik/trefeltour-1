<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Traits\Seedable;

class BadasoDeploymentOrchestratorSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = 'database/seeders/Badaso/CRUD/';

    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $this->seed(BranchesCRUDDataTypeAdded::class);
        $this->seed(BranchesCRUDDataRowAdded::class);
        $this->seed(CarsCRUDDataTypeAdded::class);
        $this->seed(CarsCRUDDataRowAdded::class);
        $this->seed(EmployeesCRUDDataTypeAdded::class);
        $this->seed(EmployeesCRUDDataRowAdded::class);
        $this->seed(RentalsCRUDDataTypeAdded::class);
        $this->seed(RentalsCRUDDataRowAdded::class);
        $this->seed(PaymentsCRUDDataTypeAdded::class);
        $this->seed(PaymentsCRUDDataRowAdded::class);
        
        
        $this->seed(CinemaStudiosCRUDDataTypeAdded::class);
        $this->seed(CinemaStudiosCRUDDataRowAdded::class);
        $this->seed(CinemaShowsCRUDDataTypeAdded::class);
        $this->seed(CinemaShowsCRUDDataRowAdded::class);
        $this->seed(CinemaSeatsCRUDDataTypeAdded::class);
        $this->seed(CinemaSeatsCRUDDataRowAdded::class);
        $this->seed(CinemaTicketsCRUDDataTypeAdded::class);
        $this->seed(CinemaTicketsCRUDDataRowAdded::class);
        $this->seed(CinemaPaymentsCRUDDataTypeAdded::class);
        $this->seed(CinemaPaymentsCRUDDataRowAdded::class);
        $this->seed(CinemaGenresCRUDDataTypeAdded::class);
        $this->seed(CinemaGenresCRUDDataRowAdded::class);
        $this->seed(CinemaMoviesCRUDDataDeleted::class);
        $this->seed(CinemaMoviesCRUDDataTypeAdded::class);
        $this->seed(CinemaMoviesCRUDDataRowAdded::class);
        
        
        $this->seed(KampusRoomsCRUDDataDeleted::class);
        $this->seed(CampusRoomsCRUDDataTypeAdded::class);
        $this->seed(CampusRoomsCRUDDataRowAdded::class);
        $this->seed(CampusCoursesCRUDDataTypeAdded::class);
        $this->seed(CampusCoursesCRUDDataRowAdded::class);
        
        
        $this->seed(CampusLecturesCRUDDataDeleted::class);
        $this->seed(CampusLecturersCRUDDataTypeAdded::class);
        $this->seed(CampusLecturersCRUDDataRowAdded::class);
        
        
        $this->seed(CampusBookingsCRUDDataDeleted::class);
        $this->seed(CampusBookingsCRUDDataTypeAdded::class);
        $this->seed(CampusBookingsCRUDDataRowAdded::class);
        
        
        $this->seed(TravelReservationsCRUDDataDeleted::class);
        
        
        
        
        
        
        $this->seed(TravelPaymentsCRUDDataDeleted::class);
        
        
        
        
        $this->seed(TravelBookingsCRUDDataDeleted::class);
        
        
        
        
        
        
        $this->seed(TravelTicketsCRUDDataDeleted::class);
        $this->seed(TravelTicketsCRUDDataTypeAdded::class);
        $this->seed(TravelTicketsCRUDDataRowAdded::class);
        
        
        
        
        
        
        $this->seed(TransportWorkshopsCRUDDataTypeAdded::class);
        $this->seed(TransportWorkshopsCRUDDataRowAdded::class);
        
        
        
        
        $this->seed(TransportReturnsCRUDDataTypeAdded::class);
        $this->seed(TransportReturnsCRUDDataRowAdded::class);
        $this->seed(TransportMaintenancesCRUDDataTypeAdded::class);
        $this->seed(TransportMaintenancesCRUDDataRowAdded::class);
        $this->seed(TransportDriversCRUDDataTypeAdded::class);
        $this->seed(TransportDriversCRUDDataRowAdded::class);
        
        
        $this->seed(TransportPaymentsValidationsCRUDDataTypeAdded::class);
        $this->seed(TransportPaymentsValidationsCRUDDataRowAdded::class);
        $this->seed(TransportStoresCRUDDataDeleted::class);
        $this->seed(TransportRentalsCRUDDataTypeAdded::class);
        $this->seed(TransportRentalsCRUDDataRowAdded::class);
        $this->seed(TransportVehiclesCRUDDataDeleted::class);
        
        
        
        
        
        
        
        
        $this->seed(TourismFacilitiesCRUDDataTypeAdded::class);
        $this->seed(TourismFacilitiesCRUDDataRowAdded::class);
        
        
        $this->seed(TourismPaymentsValidationsCRUDDataTypeAdded::class);
        $this->seed(TourismPaymentsValidationsCRUDDataRowAdded::class);
        $this->seed(TourismServicesCRUDDataTypeAdded::class);
        $this->seed(TourismServicesCRUDDataRowAdded::class);
        
        
        $this->seed(TourismCategoriesCRUDDataDeleted::class);
        $this->seed(TourismPricesCRUDDataTypeAdded::class);
        $this->seed(TourismPricesCRUDDataRowAdded::class);
        $this->seed(BadasoUsersCRUDDataTypeAdded::class);
        $this->seed(BadasoUsersCRUDDataRowAdded::class);
        $this->seed(TourismVenuesCRUDDataDeleted::class);
        $this->seed(TourismVenuesCRUDDataTypeAdded::class);
        $this->seed(TourismVenuesCRUDDataRowAdded::class);
        $this->seed(TourismPaymentsCRUDDataDeleted::class);
        $this->seed(TourismPaymentsCRUDDataTypeAdded::class);
        $this->seed(TourismPaymentsCRUDDataRowAdded::class);
        
        
        $this->seed(TalentPaymentsCRUDDataTypeAdded::class);
        $this->seed(TalentPaymentsCRUDDataRowAdded::class);
        
        
        $this->seed(TalentPaymentsValidationsCRUDDataDeleted::class);
        $this->seed(TalentPaymentsValidationsCRUDDataTypeAdded::class);
        $this->seed(TalentPaymentsValidationsCRUDDataRowAdded::class);
        
        
        
        
        $this->seed(TalentProfilesCRUDDataTypeAdded::class);
        $this->seed(TalentProfilesCRUDDataRowAdded::class);
        $this->seed(TalentSkillsCRUDDataDeleted::class);
        $this->seed(TalentSkillsCRUDDataTypeAdded::class);
        $this->seed(TalentSkillsCRUDDataRowAdded::class);
        $this->seed(TalentPricesCRUDDataDeleted::class);
        
        
        $this->seed(TalentPricesCRUDDataTypeAdded::class);
        $this->seed(TalentPricesCRUDDataRowAdded::class);
        $this->seed(TalentBookingsCRUDDataDeleted::class);
        
        
        
        
        $this->seed(SouvenirStoresCRUDDataTypeAdded::class);
        $this->seed(SouvenirStoresCRUDDataRowAdded::class);
        $this->seed(SouvenirProductsCRUDDataTypeAdded::class);
        $this->seed(SouvenirProductsCRUDDataRowAdded::class);
        
        
        $this->seed(SouvenirCartsCRUDDataTypeAdded::class);
        $this->seed(SouvenirCartsCRUDDataRowAdded::class);
        $this->seed(SouvenirBookingsCRUDDataTypeAdded::class);
        $this->seed(SouvenirBookingsCRUDDataRowAdded::class);
        $this->seed(SouvenirBookingItemsCRUDDataTypeAdded::class);
        $this->seed(SouvenirBookingItemsCRUDDataRowAdded::class);
        $this->seed(SouvenirPaymentsCRUDDataTypeAdded::class);
        $this->seed(SouvenirPaymentsCRUDDataRowAdded::class);
        $this->seed(SouvenirPaymentsValidationsCRUDDataTypeAdded::class);
        $this->seed(SouvenirPaymentsValidationsCRUDDataRowAdded::class);
        
        
        
        
        $this->seed(LodgeStaffsCRUDDataTypeAdded::class);
        $this->seed(LodgeStaffsCRUDDataRowAdded::class);
        $this->seed(LodgeFacilityCRUDDataTypeAdded::class);
        $this->seed(LodgeFacilityCRUDDataRowAdded::class);
        $this->seed(LodgeBookingsCRUDDataTypeAdded::class);
        $this->seed(LodgeBookingsCRUDDataRowAdded::class);
        $this->seed(LodgeBookingBillsCRUDDataTypeAdded::class);
        $this->seed(LodgeBookingBillsCRUDDataRowAdded::class);
        $this->seed(LodgeBookingItemsCRUDDataTypeAdded::class);
        $this->seed(LodgeBookingItemsCRUDDataRowAdded::class);
        $this->seed(LodgePaymentsCRUDDataTypeAdded::class);
        $this->seed(LodgePaymentsCRUDDataRowAdded::class);
        $this->seed(LodgePaymentsValidationsCRUDDataTypeAdded::class);
        $this->seed(LodgePaymentsValidationsCRUDDataRowAdded::class);
        $this->seed(LodgeRoomsCRUDDataDeleted::class);
        $this->seed(LodgeRoomsCRUDDataTypeAdded::class);
        $this->seed(LodgeRoomsCRUDDataRowAdded::class);
        
        
        $this->seed(LodgeCartsCRUDDataTypeAdded::class);
        $this->seed(LodgeCartsCRUDDataRowAdded::class);
        $this->seed(CulinaryStoresCRUDDataTypeAdded::class);
        $this->seed(CulinaryStoresCRUDDataRowAdded::class);
        $this->seed(CulinaryProductsCRUDDataTypeAdded::class);
        $this->seed(CulinaryProductsCRUDDataRowAdded::class);
        $this->seed(CulinaryPricesCRUDDataTypeAdded::class);
        $this->seed(CulinaryPricesCRUDDataRowAdded::class);
        $this->seed(CulinaryCartsCRUDDataTypeAdded::class);
        $this->seed(CulinaryCartsCRUDDataRowAdded::class);
        $this->seed(CulinaryBookingsCRUDDataTypeAdded::class);
        $this->seed(CulinaryBookingsCRUDDataRowAdded::class);
        $this->seed(CulinaryBookingItemsCRUDDataTypeAdded::class);
        $this->seed(CulinaryBookingItemsCRUDDataRowAdded::class);
        $this->seed(CulinaryPaymentsCRUDDataTypeAdded::class);
        $this->seed(CulinaryPaymentsCRUDDataRowAdded::class);
        $this->seed(CulinaryPaymentsValidationsCRUDDataTypeAdded::class);
        $this->seed(CulinaryPaymentsValidationsCRUDDataRowAdded::class);
        $this->seed(TalentCartsCRUDDataTypeAdded::class);
        $this->seed(TalentCartsCRUDDataRowAdded::class);
        $this->seed(TourismCartsCRUDDataTypeAdded::class);
        $this->seed(TourismCartsCRUDDataRowAdded::class);
        $this->seed(TourismBookingsCRUDDataDeleted::class);
        $this->seed(TourismBookingsCRUDDataTypeAdded::class);
        $this->seed(TourismBookingsCRUDDataRowAdded::class);
        $this->seed(TourismBookingItemsCRUDDataTypeAdded::class);
        $this->seed(TourismBookingItemsCRUDDataRowAdded::class);
        $this->seed(SouvenirPricesCRUDDataDeleted::class);
        $this->seed(SouvenirPricesCRUDDataTypeAdded::class);
        $this->seed(SouvenirPricesCRUDDataRowAdded::class);
        $this->seed(TalentBookingItemsCRUDDataTypeAdded::class);
        $this->seed(TalentBookingItemsCRUDDataRowAdded::class);
        $this->seed(TalentBookingsCRUDDataTypeAdded::class);
        $this->seed(TalentBookingsCRUDDataRowAdded::class);
        
        
        $this->seed(TransportPricesCRUDDataTypeAdded::class);
        $this->seed(TransportPricesCRUDDataRowAdded::class);
        $this->seed(TransportBookingItemsCRUDDataTypeAdded::class);
        $this->seed(TransportBookingItemsCRUDDataRowAdded::class);
        $this->seed(TransportBookingsCRUDDataDeleted::class);
        $this->seed(TransportBookingsCRUDDataTypeAdded::class);
        $this->seed(TransportBookingsCRUDDataRowAdded::class);
        $this->seed(TransportCartsCRUDDataDeleted::class);
        $this->seed(TransportCartsCRUDDataTypeAdded::class);
        $this->seed(TransportCartsCRUDDataRowAdded::class);
        $this->seed(TravelStoresCRUDDataTypeAdded::class);
        $this->seed(TravelStoresCRUDDataRowAdded::class);
        $this->seed(TravelPricesCRUDDataTypeAdded::class);
        $this->seed(TravelPricesCRUDDataRowAdded::class);
        $this->seed(TravelCartsCRUDDataTypeAdded::class);
        $this->seed(TravelCartsCRUDDataRowAdded::class);
        
        
        $this->seed(TravelReservationsCRUDDataTypeAdded::class);
        $this->seed(TravelReservationsCRUDDataRowAdded::class);
        $this->seed(TravelBookingItemsCRUDDataTypeAdded::class);
        $this->seed(TravelBookingItemsCRUDDataRowAdded::class);
        $this->seed(TravelPaymentsCRUDDataTypeAdded::class);
        $this->seed(TravelPaymentsCRUDDataRowAdded::class);
        $this->seed(TravelPaymentsValidationsCRUDDataDeleted::class);
        $this->seed(TravelPaymentsValidationsCRUDDataTypeAdded::class);
        $this->seed(TravelPaymentsValidationsCRUDDataRowAdded::class);
        $this->seed(TravelBookingsCRUDDataTypeAdded::class);
        $this->seed(TravelBookingsCRUDDataRowAdded::class);
        $this->seed(TransportVehiclesCRUDDataTypeAdded::class);
        $this->seed(TransportVehiclesCRUDDataRowAdded::class);
        $this->seed(TransportPaymentsCRUDDataDeleted::class);
        $this->seed(TransportPaymentsCRUDDataTypeAdded::class);
        $this->seed(TransportPaymentsCRUDDataRowAdded::class);
        $this->seed(LodgePricesCRUDDataDeleted::class);
        $this->seed(LodgePricesCRUDDataTypeAdded::class);
        $this->seed(LodgePricesCRUDDataRowAdded::class);
        $this->seed(LodgeProfilesCRUDDataDeleted::class);
        $this->seed(LodgeProfilesCRUDDataTypeAdded::class);
        $this->seed(LodgeProfilesCRUDDataRowAdded::class);
        
        
        $this->seed(OffersCRUDDataDeleted::class);
        $this->seed(OffersCRUDDataTypeAdded::class);
        $this->seed(OffersCRUDDataRowAdded::class);
        $this->seed(TravelPricesPublicCRUDDataTypeAdded::class);
        $this->seed(TravelPricesPublicCRUDDataRowAdded::class);
        $this->seed(AboutCRUDDataTypeAdded::class);
        $this->seed(AboutCRUDDataRowAdded::class);
        $this->seed(PageCareerSetupCRUDDataTypeAdded::class);
        $this->seed(PageCareerSetupCRUDDataRowAdded::class);
        $this->seed(PageCareerBenefitCRUDDataTypeAdded::class);
        $this->seed(PageCareerBenefitCRUDDataRowAdded::class);
        $this->seed(PageCareerCRUDDataTypeAdded::class);
        $this->seed(PageCareerCRUDDataRowAdded::class);
        
        
        $this->seed(PageContactSetupCRUDDataTypeAdded::class);
        $this->seed(PageContactSetupCRUDDataRowAdded::class);
        
        
        $this->seed(PageFaqCRUDDataTypeAdded::class);
        $this->seed(PageFaqCRUDDataRowAdded::class);
        $this->seed(PageFaqSetupCRUDDataTypeAdded::class);
        $this->seed(PageFaqSetupCRUDDataRowAdded::class);
        $this->seed(PageGalleryCRUDDataTypeAdded::class);
        $this->seed(PageGalleryCRUDDataRowAdded::class);
        $this->seed(PageServiceCRUDDataTypeAdded::class);
        $this->seed(PageServiceCRUDDataRowAdded::class);
        $this->seed(PageTeamCRUDDataTypeAdded::class);
        $this->seed(PageTeamCRUDDataRowAdded::class);
        $this->seed(PageTestimonialCRUDDataTypeAdded::class);
        $this->seed(PageTestimonialCRUDDataRowAdded::class);
        $this->seed(PageDestinationCRUDDataDeleted::class);
        $this->seed(PageDestinationCRUDDataTypeAdded::class);
        $this->seed(PageDestinationCRUDDataRowAdded::class);
        $this->seed(PageContactCRUDDataDeleted::class);
        $this->seed(PageContactCRUDDataTypeAdded::class);
        $this->seed(PageContactCRUDDataRowAdded::class);
        $this->seed(PageWidgetCallCRUDDataTypeAdded::class);
        $this->seed(PageWidgetCallCRUDDataRowAdded::class);
        $this->seed(PageWidgetCounterCRUDDataTypeAdded::class);
        $this->seed(PageWidgetCounterCRUDDataRowAdded::class);
        $this->seed(PageWidgetOfferCRUDDataTypeAdded::class);
        $this->seed(PageWidgetOfferCRUDDataRowAdded::class);
        $this->seed(PageWidgetPromoCRUDDataTypeAdded::class);
        $this->seed(PageWidgetPromoCRUDDataRowAdded::class);
        $this->seed(PageWidgetTronCRUDDataTypeAdded::class);
        $this->seed(PageWidgetTronCRUDDataRowAdded::class);
        $this->seed(PageInfoCRUDDataTypeAdded::class);
        $this->seed(PageInfoCRUDDataRowAdded::class);
    }
}
