import React, { useEffect, useState } from 'react';

type AdminProps = {
    children: React.ReactNode;
};

const Admin: React.FC<AdminProps> = ({ children }) => {
    const [isAdmin, setIsAdmin] = useState<boolean | null>(null);

    useEffect(() => {
        // Simulace kontroly přihlášení administrátora (např. volání API)
        const checkAdminStatus = async () => {
            try {
                const response = await fetch('/admin/check'); // Endpoint pro kontrolu
                const data = await response.json();
                setIsAdmin(data.isAdmin);
            } catch (error) {
                console.error('Chyba při ověřování administrátora:', error);
                setIsAdmin(false);
            }
        };

        checkAdminStatus();
    }, []);

    if (isAdmin === null) {
        return null; // Zobrazí nic nebo loader během načítání
    }

    if (!isAdmin) {
        return null; // Skryje obsah, pokud není admin
    }

    return <>{children}</>; // Zobrazí obsah, pokud je admin
};

export default Admin;
