import Hero from '@/components/misc/Hero'
import { Badge } from '@/components/ui/badge'
import Container from '@/components/ui/container'
import { Tabs, TabsContent, TabsList, TabsTrigger } from '@/components/ui/tabs'
import VehicleFeatures from '@/components/vehicle/VehicleFeatures'
import BaseLayout from '@/layouts/BaseLayout'
import { useEffect, useState } from 'react'
import {VehicleInfo} from "@/lib/types/VehicleInfo";
import VehicleCard from "@/components/vehicles/VehicleCard";
import {Link} from "@inertiajs/react";
import {Button} from "@/components/ui/button";
import {Card} from "@/components/ui/card";

const VehiclePage = ({vehicle}: {vehicle: VehicleInfo} ) => {
  const [activeTab, setActiveTab] = useState('description')

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
            <TabsTrigger className='w-full' value="description">{__('web.description')}</TabsTrigger>
            <TabsTrigger className='w-full' value="params">{__('web.params')}</TabsTrigger>
            <TabsTrigger className='w-full' value="modifications">{__('web.modifications')}</TabsTrigger>
            <TabsTrigger className='w-full' value="docs&links">{__('web.documents_and_links')}</TabsTrigger>
            <TabsTrigger className='w-full' value="photogallery">{__('web.gallery')}</TabsTrigger>
          </TabsList>
          <TabsContent value="description" className='p-4 w-full prose prose-stone dark:prose-invert mx-auto'>
              <div dangerouslySetInnerHTML={{ __html: vehicle.content_html }} />
          </TabsContent>
          <TabsContent value="params" className='p-4 w-full prose prose-stone dark:prose-invert mx-auto'>
              <div dangerouslySetInnerHTML={{ __html: vehicle.specs_html }} />
          </TabsContent>
          <TabsContent value="modifications" className='p-4 w-full prose prose-stone dark:prose-invert mx-auto'>
              <div dangerouslySetInnerHTML={{ __html: vehicle.modifications_html }} />
          </TabsContent>
          <TabsContent value="docs&links" className='p-4 w-full prose prose-stone dark:prose-invert mx-auto'>
              <div dangerouslySetInnerHTML={{ __html: vehicle.links_html }} />
          </TabsContent>
            <TabsContent value="photogallery" className='p-4 w-full prose prose-stone dark:prose-invert mx-auto'>



                <section className='grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-4'>
                    {
                        vehicle.images.length > 0 ? (
                            vehicle.images.map((image) => (
                                <Card className="p-4 flex flex-col gap-2 mb-auto">
                                    <img src={image.thumb_url} alt={vehicle.title} className='w-full h-full object-cover rounded-xl' />
                                </Card>
                            ))
                        ) : (
                            <div className="col-span-full text-center py-10">
                                {__('web.no_photos_available')}
                            </div>
                        )
                    }
                </section>
            </TabsContent>
        </Tabs>
      </Container>
    </BaseLayout>
  )
}

export default VehiclePage
