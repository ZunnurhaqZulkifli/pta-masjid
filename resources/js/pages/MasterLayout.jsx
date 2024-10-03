export default function MasterLayout({ children }) {
    return(
        <>
            <div>
                <div className="navbar">
                    
                </div>
            </div>
            <div className="p-4">
                {children}
            </div>
        </>
    );
}