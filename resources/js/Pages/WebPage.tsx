import BaseLayout from "@/layouts/BaseLayout";
import Hero from "@/components/misc/Hero";
import Container from '@/components/ui/container'
import React from "react";

export default function WebPage(props: any) {
    return (
        <BaseLayout>
            <Hero size='md' img={props.page.data.hero_img}>
                <h1 className='text-8xl font-semibold text-center font-allura text-shadow-lg/30'>{ props.page.data.title }</h1>
            </Hero>

            <Container className='p-4'>
                <div className="col-span-full text-center py-10">
                    <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=2&ctz=Europe%2FPrague&showPrint=0&showTitle=0&hl=cs&title=Srazy%20a%20jin%C3%A9%20akce&src=NmQ1MDhkNTQ2YjQ3YjRjMmQwMTZhZjk5MGJhYTM2ODM2ZGM3ZWU3ZDI5OGEwYzQ1NmVhMzBkNjA2Yjk3N2ViOUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&src=c2suc2xvdmFrI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&color=%23a79b8e&color=%23f6bf26" width="100%" height="600" frameBorder="0" scrolling="no"></iframe>
                </div>
            </Container>
        </BaseLayout>
    );
}
