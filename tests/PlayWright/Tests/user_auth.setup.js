import { test as setup, expect } from '@playwright/test';

setup('authenticate', async ({ page }) => {
    await page.goto('/admin/login');
    await page.waitForURL('/admin/login');

    await page.getByRole('textbox', { name: 'E-mail' }).fill('admin@email.test');
    await page.getByRole('textbox', { name: 'Heslo' }).fill('admin@email.test');
    await page.getByRole('button', { name: 'Prihlásenie' }).click();

    await page.waitForURL('/admin/dashboard');
    // await expect(page.locator('#main-logo')).toBeVisible();
    await expect(page.getByRole('listitem', { name: 'Dashboard' }).getByRole('link')).toBeVisible();

    await page.context().storageState({ path: './tests/PlayWrite/Storage/storage-state-user.json' });
});
