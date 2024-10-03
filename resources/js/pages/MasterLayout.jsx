import { DoubleNavbar } from "./DoubleNavbar";

export default function MasterLayout({ children }) {
    return(
        <>
            <div className="p-1">
                {children}
            </div>
        </>
    );
}