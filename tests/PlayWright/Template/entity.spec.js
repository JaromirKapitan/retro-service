import {expect, test} from "@playwright/test";

export class EntityTest {
    constructor(uri) {
        this.uri = uri;
    }

    // entity.index
    async list(page) {
        await page.goto(this.uri);
        await page.waitForURL(this.uri);
        // await expect(page.locator('#main-logo')).toBeVisible();
        await expect(page.getByRole('listitem', { name: 'Dashboard' }).getByRole('link')).toBeVisible();
    }

    // entity.create
    async create(page) {
        let uri = this.uri + '/create';
        await page.goto(uri);
        await page.waitForURL(uri);
        // await expect(page.locator('#main-logo')).toBeVisible();
        await expect(page.getByRole('listitem', { name: 'Dashboard' }).getByRole('link')).toBeVisible();
    }

    // entity.edit
    async edit(page) {
        await page.goto(this.uri);
        await page.waitForLoadState();

        await page.locator('table tr:first-child a i.fa-pencil').first().click();
        await page.waitForLoadState();
        await expect(page).toHaveURL(/[0-9]+\/edit$/);

        await expect(page.getByRole('listitem', { name: 'Dashboard' }).getByRole('link')).toBeVisible();
    }
}
