import React from 'react';
import CookiePopup from "@/components/misc/CookiePopup";
import Header from "@/components/nav/Header";
import Footer from "@/components/nav/Footer";

type Props = {
    children: React.ReactNode;
};

export default function BaseLayout({ children }: Props) {
    return (
        <>
            <CookiePopup />
            <Header />
            <main>{children}</main>
            <Footer />
        </>
    );
}
