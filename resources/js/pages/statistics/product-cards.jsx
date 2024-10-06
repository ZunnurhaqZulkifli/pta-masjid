import React from "react";

import {
  MDBContainer,
  MDBRow,
  MDBCol,
  MDBCard,
  MDBCardBody,
  MDBCardImage,
  MDBCardTitle,
  MDBIcon,
} from "mdb-react-ui-kit";

const iamges = [
    "https://app-production-sumbangan-oss1.oss-ap-southeast-3.aliyuncs.com/sumbangan.com/public/sliders/661c7d7ce283f_Sumbangan_New_Slider-05.jpg",
    "https://app-production-sumbangan-oss1.oss-ap-southeast-3.aliyuncs.com/sumbangan.com/public/sliders/661c7d7ce283f_Sumbangan_New_Slider-05.jpg",
    "https://app-production-sumbangan-oss1.oss-ap-southeast-3.aliyuncs.com/sumbangan.com/public/sliders/661c7d7ce283f_Sumbangan_New_Slider-05.jpg",
    "https://app-production-sumbangan-oss1.oss-ap-southeast-3.aliyuncs.com/sumbangan.com/public/sliders/661c7d7ce283f_Sumbangan_New_Slider-05.jpg",
    "https://app-production-sumbangan-oss1.oss-ap-southeast-3.aliyuncs.com/sumbangan.com/public/sliders/661c7d7ce283f_Sumbangan_New_Slider-05.jpg",
];

function ProductCard({ payments }) {
  return (
    <MDBContainer fluid className="my-5">
      <MDBRow className="justify-content-start">
        {
            payments.map((stat, index) => (
                <MDBCol md="3" key={index}>
                    <MDBCard className={`text-black ${index === 4 ? 'mt-4' : ''}`}>
                        <MDBIcon fab icon="apple" size="lg" className="px-3 pt-3 pb-2" />
                        <MDBCardImage
                            src={iamges[index]}
                            position="top"
                            alt={stat.id}
                        />
                        <MDBCardBody>
                        <div className="text-center">
                            <MDBCardTitle>{stat.id}</MDBCardTitle>
                            <p className="text-muted mb-4">{stat.payment_type.name}</p>
                        </div>
                        <div>
                            <div className="d-flex justify-content-between">
                            <span>Dikemaskini Pada</span>
                            <span>{
                            new Intl.DateTimeFormat('en-US', {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric',
                            }).format(new Date(stat.payment_type.created_at))
                            }</span>
                            </div>
                        </div>
                        <div className="d-flex justify-content-between total font-weight-bold mt-4">
                            <span>Jumlah</span>
                            <span>
                            RM {new Intl.NumberFormat('en-US', { style: 'decimal', minimumFractionDigits: 2, maximumFractionDigits: 2 }).format(stat.amount)}
                            </span>
                        </div>
                        </MDBCardBody>
                    </MDBCard>
                </MDBCol>
            ))
        }
      </MDBRow>
    </MDBContainer>
  );
}

export default ProductCard;