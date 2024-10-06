import React, { useState } from "react";
import { StatsGroup } from "./dashboard_stats";
import './dashboard.css'; // Import the custom CSS

export default function Dashboard() {
    const images = [
        "https://via.placeholder.com/500x200",
        "https://via.placeholder.com/500x200",
        "https://via.placeholder.com/500x200",
        "https://via.placeholder.com/500x200",
    ];

    const [currentImage, setCurrentImage] = useState(images[0]);

    return (
        <>
            <h1>Selamat Datang !</h1>

            <div className="row">
                <div className="col-10 image-container">
                    <img src={currentImage} alt="Main display" />
                </div>

                <div className="col-2 image-container">
                    {images.map((item, index) => (
                        <div key={index} className="card mb-2" onClick={() => setCurrentImage(item)}>
                            <img src={item} alt={`Thumbnail ${index + 1}`} />
                        </div>
                    ))}
                </div>
            </div>

            <div className="mt-2">
                <StatsGroup />
            </div>
        </>
    );
}