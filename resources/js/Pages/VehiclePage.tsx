import Hero from '@/components/misc/Hero'
import {Badge} from '@/components/ui/badge'
import Container from '@/components/ui/container'
import {Tabs, TabsContent, TabsList, TabsTrigger} from '@/components/ui/tabs'
import BaseLayout from '@/layouts/BaseLayout'
import {useEffect, useState} from 'react'
import {VehicleInfo} from "@/lib/types/VehicleInfo"
import VehicleGallery from '@/components/vehicle/VehicleGallery'
import Admin from "@/components/Admin"
import { Button } from '@/components/ui/button'

const VehiclePage = ({vehicle}: { vehicle: VehicleInfo }) => {
    const [activeTab, setActiveTab] = useState('links')
    const hasContent = typeof vehicle.content_html === 'string' && vehicle.content_html.replace(/<[^>]*>/g, '').trim().length > 0
    const hasSpecs = typeof vehicle.specs_html === 'string' && vehicle.specs_html.replace(/<[^>]*>/g, '').trim().length > 0
    const hasMods = typeof vehicle.modifications_html === 'string' && vehicle.modifications_html.replace(/<[^>]*>/g, '').trim().length > 0
    const hasLinks = typeof vehicle.links_html === 'string' && vehicle.links_html.replace(/<[^>]*>/g, '').trim().length > 0
    let hasGallery = Array.isArray(vehicle.images) && vehicle.images.length >= 2

    useEffect(() => {
        const handleHashChange = () => {
            const hash = window.location.hash.replace('#', '')
            const validTabs = ['description', 'links', 'photogallery']

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
                    <h1 className='text-6xl font-semibold text-center font-allura text-shadow-lg/30'>{vehicle.title}</h1>
                    <div className='flex gap-4 absolute right-4 -bottom-28'>
                        <Badge>{vehicle.sub_title}</Badge>
                    </div>
                </div>
            </Hero>
            <Container className='p-4'>
                <Tabs value={activeTab} onValueChange={onTabChange} defaultValue="description">
                    <div className='flex flex-col md:flex-row gap-4 mt-4 w-full relative px-4'>
                        <TabsList className="mx-auto flex-col h-auto w-full md:w-auto md:flex-row">
                            <TabsTrigger className='w-full' value="links">{__('web.documents_and_links')}</TabsTrigger>
                            {hasContent && (
                                <TabsTrigger className='w-full' value="description">{__('web.description')}</TabsTrigger>
                            )}
                            {hasSpecs && (
                                <TabsTrigger className='w-full' value="params">{__('web.params')}</TabsTrigger>
                            )}
                            {hasMods && (
                                <TabsTrigger className='w-full' value="modifications">{__('web.modifications')}</TabsTrigger>
                            )}
                            {hasGallery && (
                                <TabsTrigger className='w-full' value="photogallery">{__('web.gallery')}</TabsTrigger>
                            )}
                        </TabsList>
                        <Admin>
                            <Button className='w-full md:w-fit md:absolute right-0' variant={'outline'} size={'sm'} asChild>
                                <a href={`/admin/vehicles/${vehicle.id}`} target='_blank'>
                                    {__('web.admin')}
                                </a>
                            </Button>
                        </Admin>
                    </div>

                    <TabsContent value="links" className='p-4 w-full prose prose-stone dark:prose-invert max-w-full mx-auto'>
                        {hasLinks ? (
                            <div dangerouslySetInnerHTML={{__html: vehicle.links_html}}/>
                        ) : (
                            <div className="col-span-full text-center py-10">
                                {__('web.no_docs_available')}
                            </div>
                        )}
                    </TabsContent>

                    {hasContent && (
                        <TabsContent value="description" className='p-4 w-full prose prose-stone dark:prose-invert max-w-full mx-auto'>
                            <div dangerouslySetInnerHTML={{__html: vehicle.content_html}}/>
                        </TabsContent>
                    )}
                    {hasSpecs && (
                        <TabsContent value="params" className='p-4 w-full prose prose-stone dark:prose-invert max-w-full mx-auto'>
                            <div dangerouslySetInnerHTML={{__html: vehicle.specs_html}}/>
                        </TabsContent>
                    )}
                    {hasMods && (
                        <TabsContent value="modifications" className='p-4 w-full prose prose-stone dark:prose-invert max-w-full mx-auto'>
                            <div dangerouslySetInnerHTML={{__html: vehicle.modifications_html}}/>
                        </TabsContent>
                    )}
                    {hasGallery && (
                        <TabsContent value="photogallery" className='p-4 w-full max-w-full mx-auto'>
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
