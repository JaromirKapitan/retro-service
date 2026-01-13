import Hero from '@/components/misc/Hero'
import {Badge} from '@/components/ui/badge'
import Container from '@/components/ui/container'
import {Tabs, TabsContent, TabsList, TabsTrigger} from '@/components/ui/tabs'
import BaseLayout from '@/layouts/BaseLayout'
import {useEffect, useState} from 'react'
import {VehicleInfo} from "@/lib/types/VehicleInfo";
import VehicleGallery from '@/components/vehicle/VehicleGallery'
import {Link} from "@inertiajs/react";
import Admin from "@/components/Admin";

const VehiclePage = ({vehicle}: { vehicle: VehicleInfo }) => {
    const [activeTab, setActiveTab] = useState('description')
    const hasContent = typeof vehicle.content_html === 'string' && vehicle.content_html.replace(/<[^>]*>/g, '').trim().length > 0
    const hasSpecs = typeof vehicle.specs_html === 'string' && vehicle.specs_html.replace(/<[^>]*>/g, '').trim().length > 0
    const hasMods = typeof vehicle.modifications_html === 'string' && vehicle.modifications_html.replace(/<[^>]*>/g, '').trim().length > 0
    const hasLinks = typeof vehicle.links_html === 'string' && vehicle.links_html.replace(/<[^>]*>/g, '').trim().length > 0
    let hasGallery = Array.isArray(vehicle.images) && vehicle.images.length >= 2

    useEffect(() => {
        const handleHashChange = () => {
            const hash = window.location.hash.replace('#', '')
            const validTabs = ['description', 'docs&links', 'photogallery']

            if (validTabs.includes(hash)) {
                setActiveTab(hash)
            }
        }

        handleHashChange()
    }, [])

    const onTabChange = (value: string) => {
        setActiveTab(value)
        console.log('set to: ', value)
        window.history.pushState(null, '', `#${value}`)
    }

    return (
        <BaseLayout>
            <Hero img={vehicle.hero_img}>
                <div className='flex flex-col gap-4 items-center justify-center relative'>
                    <h1 className='text-4xl font-semibold text-center'>{vehicle.title}</h1>
                    <div className='flex gap-4 absolute right-4 -bottom-28'>
                        <Badge>Auto</Badge>
                        <Badge>{vehicle.sub_title}</Badge>
                    </div>
                </div>
            </Hero>
            <Container className='p-4'>
                <Tabs value={activeTab} onValueChange={onTabChange} defaultValue="description">
                    <TabsList className="mx-auto mt-4 flex-col h-auto w-full md:w-auto md:flex-row">
                        {hasContent && (
                            <TabsTrigger className='w-full' value="description">{__('web.description')}</TabsTrigger>
                        )}
                        {hasSpecs && (
                            <TabsTrigger className='w-full' value="params">{__('web.params')}</TabsTrigger>
                        )}
                        {hasMods && (
                            <TabsTrigger className='w-full' value="modifications">{__('web.modifications')}</TabsTrigger>
                        )}
                        {hasLinks && (
                            <TabsTrigger className='w-full' value="docs&links">{__('web.documents_and_links')}</TabsTrigger>
                        )}
                        {hasGallery && (
                            <TabsTrigger className='w-full' value="photogallery">{__('web.gallery')}</TabsTrigger>
                        )}
                        <Admin>
                            <a href={`/admin/vehicles/${vehicle.id}`} className='w-full px-2' target='_blank'>
                                {__('web.admin')}
                            </a>
                        </Admin>
                    </TabsList>

                    {hasContent && (
                        <TabsContent value="description" className='p-4 w-full prose prose-stone dark:prose-invert mx-auto'>
                            <div dangerouslySetInnerHTML={{__html: vehicle.content_html}}/>
                        </TabsContent>
                    )}
                    {hasSpecs && (
                        <TabsContent value="params" className='p-4 w-full prose prose-stone dark:prose-invert mx-auto'>
                            <div dangerouslySetInnerHTML={{__html: vehicle.specs_html}}/>
                        </TabsContent>
                    )}
                    {hasMods && (
                        <TabsContent value="modifications" className='p-4 w-full prose prose-stone dark:prose-invert mx-auto'>
                            <div dangerouslySetInnerHTML={{__html: vehicle.modifications_html}}/>
                        </TabsContent>
                    )}
                    {hasLinks && (
                        <TabsContent value="docs&links" className='p-4 w-full prose prose-stone dark:prose-invert mx-auto'>
                            <div dangerouslySetInnerHTML={{__html: vehicle.links_html}}/>
                        </TabsContent>
                    )}
                    {hasGallery && (
                        <TabsContent value="photogallery" className='p-4 w-full prose prose-stone dark:prose-invert mx-auto'>
                            {
                                vehicle.images.length > 0 ? (
                                    <VehicleGallery id="gallery" images={vehicle.images} />
                                ) : (
                                    <div className="col-span-full text-center py-10">
                                        {__('web.no_photos_available')}
                                    </div>
                                )
                            }
                        </TabsContent>
                    )}
                </Tabs>
            </Container>
        </BaseLayout>
    )
}

export default VehiclePage
