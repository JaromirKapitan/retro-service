import { test, expect } from '@playwright/test';
import {EntityTest} from "../Template/entity.spec.js";

let uri = '/admin/web-pages';
let entityTest = new EntityTest(uri);

test(uri, async ({page}) => await entityTest.list(page));
test(uri + '/create', async ({page}) => await entityTest.create(page));
test(uri + '/edit', async ({page}) => await entityTest.edit(page));
